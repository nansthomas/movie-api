<?php

$time = microtime(TRUE);


require 'vendor/autoload.php';

error_reporting(E_ALL);
ini_set('display_errors', 1);

define('ROOT', dirname(__FILE__));

// Config
include 'config/options.php';

use App\facebook\FacebookConnect;
use App\facebook\RegisterFacebook;
use App\Config\Database;
use App\Config\Cache;

// use Psr\Http\Message\ServerRequestInterface;
// use Psr\Http\Message\ResponseInterface;

session_start();

//Initialized object
$pdo = new database();
$connect = new FacebookConnect(APP_ID, APP_SECRET);

// Cache
$Cache = new Cache(ROOT.'/tmp', 10);


$user = null;
$user = $connect->connect($user);


if (!is_string($user))
{

  $write = new RegisterFacebook();

	$db_user = $write->checkUser($user);

  	if (!empty($db_user)) {

  		// If the user exist, put data in SESSION
		$_SESSION['user_id'] = $db_user[0]->user_id;
		$_SESSION['first_name'] = $db_user[0]->first_name;
		$_SESSION['last_name'] = $db_user[0]->last_name;
	  } else {

	  	// Else, add it in DB
		$isAdded = $write->addUser($user);
	}
}

// Get the query
$q = empty($_GET['q']) ? '' : $_GET['q'];
$event_id = empty($_GET['event_id']) ? '' : $_GET['event_id'];

// Routes
if($q == '')
	$page = 'home';
else if($q == 'explore')
	$page = 'explore';
else if($q == 'seance')
	$page = 'seance';
else if($q == 'profile')
	$page = 'profile';
else if($q == 'login')
	$page = 'login';
else if($q == 'dashboard')
	$page = 'dashboard';
else if($q == 'create')
	$page = 'create';
else if($q == 'adminevent')
	$page = 'adminevent';
else if($q == 'logout')
	$page = 'logout';
else if($q == 'geojson')
  $page = 'geojson';
else if($q == 'send-event')
  $page = 'send-event';
else
	$page = '404';

// Includes
include 'controllers/pages/'.$page.'.php';
include 'views/partials/html-top.php';
include 'views/partials/nav.php';
include 'views/pages/'.$page.'.php';
include 'views/partials/footer.php';
include 'views/partials/html-bottom.php';
