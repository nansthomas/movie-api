<?php 

$title = 'Création d\'un évênement';
$class = 'dashboard';

$user_id = $_SESSION['user_id'];

$query = "SELECT *
		  FROM events,organized
		  WHERE events.event_id = organized.event_id
		  AND organized.user_id = $user_id";
$event_created = $pdo->select($query);