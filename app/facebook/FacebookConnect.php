<?php

namespace App\Facebook;

use App\Config\Database;

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
            $profile_request = $fb->get('/me?fields=name,first_name,last_name,email,picture.width(200).height(200), gender, birthday');
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

class RegisterFacebook extends Database {

  function __construct () {

  }

  public function checkUser ($user) {
    $facebook_id = $user['id'];

    $query = "SELECT *
          FROM users
          WHERE facebook_id = $facebook_id";
    $db_user = $this->select($query);

    return $db_user;

  }

  public function addUser ($user) {
    $first_name = $user['first_name'];
    $last_name = $user['last_name'];
    $picture_url = $user['picture']['url'];
    $email = $user['email'];
    $facebook_id = $user['id'];
    $genre = $user['gender'];
    $age = $user['birthday']; // NEED TO CONVERT

    $query = "INSERT INTO users (first_name, last_name, picture_url, email, facebook_id, genre)
              VALUES ('$first_name', '$last_name', '$picture_url', '$email', '$facebook_id', '$genre')";

    $insert = $this->prepareQuery($query);

    if ($insert)
        return true;
    else
        return false;

  }

}
