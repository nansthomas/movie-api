<?php  

use App\Events\getEvents;
$update = new getEvents();

$event_id = $_GET['event_id'];
$user_id = $_SESSION['user_id'];

// Search if its already done or not
$result = $update->getAttendInfo ($user_id, $event_id);

if ($result == NULL) {
	$update->addRequest($event_id,$user_id);
	$update->addPendingRequest($event_id);
}