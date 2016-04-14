<?php  

use App\Events\getEvents;
$update = new getEvents();

$event_id = $_GET['event_id'];
$user_id = $_SESSION['user_id'];

// // Search if its already done or not
// $query = "SELECT attend (event_id,user_id)
// 		  VALUES ($event_id,$user_id)";
// $prepare = $pdo->prepareQuery($query);

// Add request into attend table
$query = "INSERT INTO attend (event_id,user_id)
		  VALUES ($event_id,$user_id)";
$prepare = $pdo->prepareQuery($query);

// Add +1 to the pending request value
$query = "UPDATE events
		  SET pending_request = pending_request + 1
		  WHERE event_id = $event_id";
$prepare = $pdo->prepareQuery($query);