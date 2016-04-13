<?php 

$title = 'Création d\'un évênement';
$class = 'dashboard';

$user_id = $_SESSION['user_id'];

// Query for event that the user created
$query = "SELECT *
		  FROM events,organized
		  WHERE events.event_id = organized.event_id
		  AND organized.user_id = $user_id";
$event_created = $pdo->select($query);

// Query for event that the user want to attend
// --> Accepted
$query = "SELECT *
		  FROM events,attend
		  WHERE events.event_id = attend.event_id
		  AND attend.user_id = $user_id
		  AND attend.is_accepted = 1";
$accepted_event = $pdo->select($query);

// --> Still waiting
$query = "SELECT *
		  FROM events,attend
		  WHERE events.event_id = attend.event_id
		  AND attend.user_id = $user_id
		  AND attend.is_accepted IS NULL";
$waiting_event = $pdo->select($query); 