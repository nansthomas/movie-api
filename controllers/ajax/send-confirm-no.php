<?php  

use App\Events\getEvents;
$update = new getEvents();

$user_id = $_GET['user_id'];
$event_id = $_GET['event_id'];

$status = $update->getAttendInfo($user_id,$event_id);

if ($status->is_accepted != 0) {
	$is_accepted_status = $update->setIsAccepted($user_id,$event_id,0);
	$update_events = $update->updateEventPlaces($event_id, 0);
}