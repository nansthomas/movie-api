<?php  

$event_id = $target;
$user_id = $_SESSION['user_id'];

// Add request into attend table
$query = "INSERT INTO attend (event_id,user_id)
		  VALUES ($event_id,$user_id)";
$prepare = $pdo->prepareQuery($query);

// Add +1 to the pending request value
$query = "UPDATE events
		  SET pending_request = pending_request + 1
		  WHERE event_id = $event_id";
$prepare = $pdo->prepareQuery($query);