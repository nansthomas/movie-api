<?php

use App\Facebook\RegisterFacebook;

$title = $_SESSION['first_name'].' '.$_SESSION['last_name'];
$user_id = $_GET['user_id'];

$u = new RegisterFacebook();

$user_info = $u->displayUser($user_id);