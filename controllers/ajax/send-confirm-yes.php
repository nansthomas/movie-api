<?php  

$user_id = $target1;
$event_id = $target2;

// Update is_accepted status
$query = "UPDATE attend
		  SET is_accepted = 1
		  WHERE user_id = $user_id
		  AND event_id = $event_id";
$prepare = $pdo->prepareQuery($query);

// -1 to pending request and +1 to place taken
$query = "UPDATE events
		  SET pending_request = pending_request - 1,
		      place_taken = place_taken + 1
		  WHERE event_id = $event_id";
$prepare = $pdo->prepareQuery($query);