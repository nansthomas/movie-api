<?php

	$title = $_SESSION['first_name'].' '.$_SESSION['last_name'];
	$user_id = $_GET['user_id'];

	// Get organisator and event info
	$query = "SELECT *
			  FROM users
			  WHERE user_id = $user_id";

	$user_info = $pdo->select($query,false);
