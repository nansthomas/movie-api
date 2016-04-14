<?php  

use App\Events\getEvents;
$update = new getEvents();

$user_id = $_GET['user_id'];
$event_id = $_GET['event_id'];

$status = $update->getAttendInfo($user_id,$event_id);

if ($status->is_accepted != 1) {
	$is_accepted_status = $update->setIsAccepted($user_id,$event_id,1);
	$update_events = $update->updateEventPlaces($event_id, 1);
}
