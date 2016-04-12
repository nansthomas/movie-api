<?php

// Config
include 'config/options.php';
include 'config/database.php';

session_start();

// Get the query
$q = empty($_GET['q']) ? '' : $_GET['q'];
$par = empty($_GET['par']) ? '' : $_GET['par'];

// Routes
if($q == 'send-attend')
	$page = 'send-attend';
else
	$page = false;

// Include
if ($page != false) {
	include 'controllers/ajax/'.$page.'.php';
}