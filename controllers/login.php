<?php

require 'vendor/autoload.php';

$fb = new Facebook\Facebook([
  'app_id' => '1703544296582819',
  'app_secret' => '841701dd4b9b535e585993653976e086',
  'default_graph_version' => 'v2.5',
  //'default_access_token' => '{access-token}', // optional
]);

$helper = $fb->getRedirectLoginHelper();
$permissions = ['email'];
$loginUrl = $helper->getLoginUrl('http://localhost:8888/login-callback', $permissions);

echo '<a href="' . $loginUrl . '">Log in with Facebook!</a>';
