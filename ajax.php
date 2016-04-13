<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

// Config
include 'config/options.php';

use App\Config\Database;
require 'vendor/autoload.php';
session_start();
//Initialized object
$pdo = new Database('moviehome');

// Get the query
$q = empty($_GET['q']) ? '' : $_GET['q'];
// $target = empty($_GET['target']) ? '' : $_GET['target'];
// $target1 = empty($_GET['target1']) ? '' : $_GET['target1'];
// $target2 = empty($_GET['target2']) ? '' : $_GET['target2'];
// $query = empty($_GET['query']) ? '' : $_GET['query'];

// Routes
if($q == 'send-attend')
	$page = 'send-attend';
else if($q == 'send-confirm-yes')
	$page = 'send-confirm-yes';
else if($q == 'send-confirm-no')
	$page = 'send-confirm-no';
else if($q == 'search-movie')
	$page = 'search-movie';
else
	$page = false;

// Include
if ($page != false) {
	include 'controllers/ajax/'.$page.'.php';
}