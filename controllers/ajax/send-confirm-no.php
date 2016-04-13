<?php  

$user_id = $_GET['user_id'];
$event_id = $_GET['event_id'];

// Update is_accepted status
$query = "UPDATE attend
		  SET is_accepted = 0
		  WHERE user_id = $user_id
		  AND event_id = $event_id";
$prepare = $pdo->prepareQuery($query);

// -1 to pending request and +1 to place taken
$query = "UPDATE events
		  SET pending_request = pending_request - 1
		  WHERE event_id = $event_id";
$prepare = $pdo->prepareQuery($query);