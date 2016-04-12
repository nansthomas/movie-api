<?php

namespace App\Facebook;

use Facebook\Exceptions\FacebookResponseException;
use Facebook\Exceptions\FacebookSDKException;
use Facebook\Facebook;

class FacebookConnect {

  // $appId Facebook Application ID & $appSecret Facebook Secret Application
  function __construct($appId, $appSecret) {
    $this->appId = $appId;
    $this->appSecret = $appSecret;
  }

  // $ redirect_url
  function connect($user) {

    $fb = new Facebook([
      'app_id' => $this->appId,
      'app_secret' => $this->appSecret,
      'default_graph_version' => 'v2.4',
    ]);

    $helper = $fb->getRedirectLoginHelper();
    $permissions = ['email'];

    try {
        if (isset($_SESSION['facebook_access_token'])) {
            $accessToken = $_SESSION['facebook_access_token'];
        } else {
            $accessToken = $helper->getAccessToken();
        }
    } catch(FacebookResponseException $e) {
        // When Graph returns an error
        echo 'Graph returned an error: ' . $e->getMessage();
        exit;

    } catch(FacebookSDKException $e) {
        // When validation fails or other local issues
        echo 'Facebook SDK returned an error: ' . $e->getMessage();
        exit;
     }


    if (isset($accessToken)) {
        if (isset($_SESSION['facebook_access_token'])) {
            $fb->setDefaultAccessToken($_SESSION['facebook_access_token']);
        } else {
            // getting short-lived access token
            $_SESSION['facebook_access_token'] = (string) $accessToken;
            // OAuth 2.0 client handler
            $oAuth2Client = $fb->getOAuth2Client();
            // Exchanges a short-lived access token for a long-lived one
            $longLivedAccessToken = $oAuth2Client->getLongLivedAccessToken($_SESSION['facebook_access_token']);
            $_SESSION['facebook_access_token'] = (string) $longLivedAccessToken;
            // setting default access token to be used in script
            $fb->setDefaultAccessToken($_SESSION['facebook_access_token']);
        }

        // redirect the user back to the same page if it has "code" GET variable
        if (isset($_GET['code'])) {
            header('Location: ./');
        }

        // getting basic info about user
        try {
            $profile_request = $fb->get('/me?fields=name,first_name,last_name,email,picture');
            $profile = $profile_request->getGraphNode()->asArray();


        } catch(FacebookResponseException $e) {
            // When Graph returns an error
            echo 'Graph returned an error: ' . $e->getMessage();
            session_destroy();

            // redirecting user back to app login page
            header("Location: ./");
            exit;

        } catch(FacebookSDKException $e) {
            // When validation fails or other local issues
            echo 'Facebook SDK returned an error: ' . $e->getMessage();
            exit;
        }

        // printing $profile array on the screen which holds the basic info about user
        //print_r($profile);
        return $profile;
        // Now you can redirect to another page and use the access token from $_SESSION['facebook_access_token']

    } else {
        // replace your website URL same as added in the developers.facebook.com/apps e.g. if you used http instead of https and you used non-www version or www version of your website then you must add the same here
        $loginUrl = $helper->getLoginUrl(URL, $permissions);
        return $loginUrl;
    }
  }
}

class RegisterFacebook {

  function __construct ($pdo) {
    $this->pdo = $pdo;
  }

  public function checkUser ($user, $pdo) {

    $facebook_id = $user['id'];

    $query = 'SELECT *
          FROM users
          WHERE facebook_id = :facebook_id';
    $prepare = $pdo->prepare($query);

    $prepare->bindValue('facebook_id',$facebook_id);
    $prepare->execute();
    $db_user = $prepare->fetchAll();

    if (empty($db_user))
        return false;
    else
        return true;
  }

  public function getUser ($user) {

    $itemQuery = $this->pdo->prepare("INSERT INTO User (firstName, lastName, email) VALUES (:firstName, :lastName, :email)");
    $itemQuery->bindParam(':firstName', $user['first_name']);
    $itemQuery->bindParam(':lastName', $user['last_name']);
    $itemQuery->bindParam(':email', $user['email']);
    $q = $itemQuery->execute();

  }

}
