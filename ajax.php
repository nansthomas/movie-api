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
$para = empty($_GET['para']) ? '' : $_GET['para'];

// Routes
if($q == 'send-attend')
	$page = 'send-attend';
else
	$page = false;

// Include
if ($page != false) {
	include 'controllers/ajax/'.$page.'.php';
}