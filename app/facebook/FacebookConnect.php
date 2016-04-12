<?php

namespace App\Facebook;

use Facebook\FacebookRedirectionLoginHelper;
use Facebook\FacebookRequest;
use Facebook\Facebook;


class FacebookConnect {


  // $appId Facebook Application ID & $appSecret Facebook Secret Application
  function __construct($appId, $appSecret) {
    $this->appId = $appId;
    $this->appSecret = $appSecret;
  }

  // $ redirect_url
  function connect($redirect_url) {
    $fb = new Facebook([
      'app_id'     => $this->appId,
      'app_secret' => $this->appSecret,
      'default_graph_version' => 'v2.4',
    ]);

    $helper = $fb->getRedirectLoginHelper();

    $permissions = ['email'];
    $callback = 'http://localhost:8888';
    $loginUrl = $helper->getLoginUrl($callback, $permissions);

    try {
      $accessToken = $helper->getAccessToken();
    } catch(Facebook\Exceptions\FacebookSDKException $e) {
      // There was an error communicating with Graph
      echo $e->getMessage();
      exit;
    }

    if (isset($accessToken)) {

      try {

        $_SESSION['facebook_access_token'] = (string) $accessToken;
        $request = new FacebookRequest($session, 'GET', '/me');
        $profile = $request->execute()->getGraphObject('Facebook\GraphUser');

        if ($profile->getEmail() === null) {
          throw new \Exception('Email pas disponible');
        }

        return $profile;

      } catch (\Exception $e) {
        unset($_SESSION['fb_token']);
        return $helper->getReRequestUrl(['email']);
      }

    } else {
      return $helper->getLoginUrl(['email']);
    }

  }

}
