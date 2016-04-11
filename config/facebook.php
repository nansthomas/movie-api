<?php

session_start();

require 'vendor/autoload.php';

$fb = new Facebook\Facebook([
  'app_id' => '1703544296582819',
  'app_secret' => '841701dd4b9b535e585993653976e086',
  'default_graph_version' => 'v2.5',
  //'default_access_token' => '{access-token}', // optional
]);

// Use one of the helper classes to get a Facebook\Authentication\AccessToken entity.
$helper = $fb->getRedirectLoginHelper();
//   $helper = $fb->getJavaScriptHelper();
  // $helper = $fb->getCanvasHelper();
//   $helper = $fb->getPageTabHelper();

try {
  // Get the Facebook\GraphNodes\GraphUser object for the current user.
  // If you provided a 'default_access_token', the '{access-token}' is optional.
  $accessToken = $helper->getAccessToken();
  $response = $fb->get('/me?fields=id,name', $accessToken);
} catch(Facebook\Exceptions\FacebookResponseException $e) {
  // When Graph returns an error
  echo 'Graph returned an error: ' . $e->getMessage();
  exit;
} catch(Facebook\Exceptions\FacebookSDKException $e) {
  // When validation fails or other local issues
  echo 'Facebook SDK returned an error: ' . $e->getMessage();
  exit;
}

$me = $response->getGraphUser();
echo 'Logged in as ' . $me->getName();
