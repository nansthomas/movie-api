<?php  

use App\Events\getEvents;
$update = new getEvents();

$event_id = $_GET['event_id'];
$user_id = $_SESSION['user_id'];

// Search if its already done or not
$result = getAttendInfo ($user_id, $event_id)

if (empty($result)) {
	$update->addRequest($event_id,$user_id);
	$update->addPendingRequest($event_id);
}
