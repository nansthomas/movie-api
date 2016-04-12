<?php

// Config
include 'config/options.php';
include 'config/database.php';

session_start();

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