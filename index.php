<?php
session_start();

// Config
include 'config/options.php';
include 'config/database.php';

// Force a SESSION right now, because FB connect don't work, to delete when FB Connect work
$_SESSION['user_id']    = 1;
$_SESSION['first_name']  = 'Mickael';

// Get the query
$q = empty($_GET['q']) ? '' : $_GET['q'];

// Routes
if($q == '')
	$page = 'home';
else if($q == 'login')
	$page = 'login';
else if($q == 'login-callback')
	$page = 'login-callback';
else if($q == 'explore')
	$page = 'explore';
else if(preg_match('/^seance\/[0-9]+$/',$q))
	$page = 'seance';
// else if($q == 'seance')
// 	$page = 'seance';
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

echo '<h1>DEBUG</h1>';
echo '<pre>';
print_r($_SESSION);
echo '</pre>';