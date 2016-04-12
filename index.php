<?php

// Config
include 'config/options.php';
include 'config/database.php';

use App\Facebook\FacebookConnect;
use App\Facebook\RegisterFacebook;

require 'vendor/autoload.php';

session_start();

$connect = new FacebookConnect(APP_ID, APP_SECRET);
$user = null;
$user = $connect->connect($user);

if (is_string($user)) {
  echo '<a href="' . $user . '">Log in with Facebook!</a>';
} else {
  $write = new RegisterFacebook($pdo, $user);
  $db_user = $write->checkUser($user);
  // $data = $write->getUser($user);
}

// Get the query
$q = empty($_GET['q']) ? '' : $_GET['q'];
$event_id = empty($_GET['event_id']) ? '' : $_GET['event_id'];

// Routes
if($q == '')
	$page = 'home';
else if($q == 'login')
	$page = 'login';
else if($q == 'login-callback')
	$page = 'login-callback';
else if($q == 'explore')
	$page = 'explore';
else if($q == 'seance')
	$page = 'seance';
else if($q == 'dashboard')
	$page = 'dashboard';
else if($q == 'creation')
	$page = 'creation';
else
	$page = '404';

// Includes
include 'controllers/'.$page.'.php';
include 'views/partials/html-top.php';
include 'views/partials/nav.php';
include 'views/pages/'.$page.'.php';
include 'views/partials/footer.php';
include 'views/partials/html-bottom.php';
