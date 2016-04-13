<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Config
include 'config/options.php';

use App\Facebook\FacebookConnect;
use App\Facebook\RegisterFacebook;
use App\Config\Database;

// use Psr\Http\Message\ServerRequestInterface;
// use Psr\Http\Message\ResponseInterface;

require 'vendor/autoload.php';

session_start();

//Initialized object
$pdo = new Database('moviehome');
$connect = new FacebookConnect(APP_ID, APP_SECRET);


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


// $app = new \Slim\App;
//
// $app->get('/', function (ServerRequestInterface $request, ResponseInterface $response) {
//     include 'controllers/home.php';
//     include 'views/partials/html-top.php';
//     include 'views/partials/nav.php';
//     include 'views/pages/home.php';
//     return $response;
// });
// $app->get('/explore', function (ServerRequestInterface $request, ResponseInterface $response) {
//     include 'controllers/explore.php';
//     include 'views/partials/html-top.php';
//     include 'views/partials/nav.php';
//     include 'views/pages/explore.php';
//     return $response;
// });
// $app->get('/geojson', function (ServerRequestInterface $request, ResponseInterface $response) {
//     include 'controllers/geojson.php';
//     return $response;
// });
// $app->run();


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
else if($q == 'dashboard')
	$page = 'dashboard';
else if($q == 'creation')
	$page = 'creation';
else if($q == 'adminevent')
	$page = 'adminevent';
else if($q == 'logout')
	$page = 'logout';
else if($q == 'geojson')
  $page = 'geojson';
else
	$page = '404';

// Includes
include 'controllers/'.$page.'.php';
include 'views/partials/html-top.php';
include 'views/partials/nav.php';
include 'views/pages/'.$page.'.php';
include 'views/partials/footer.php';
include 'views/partials/html-bottom.php';
