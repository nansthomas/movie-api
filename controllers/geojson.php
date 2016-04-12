<?php

if (array_key_exists('user_id', $_SESSION)) {
	$user_id = $_SESSION['user_id'];

	$query = "SELECT events.*, users.*
		  	  FROM events, users, organized
		  	  WHERE events.event_id = organized.event_id
		  	  AND users.user_id = organized.user_id
		  	  AND events.place_nb > events.place_taken
		  	  AND users.user_id != $user_id";
}
else {
	$query = "SELECT events.*, users.*
		  	  FROM events, users, organized
		  	  WHERE events.event_id = organized.event_id
		      AND users.user_id = organized.user_id
		  	  AND events.place_nb > events.place_taken";
}

$events_list = $pdo->select($query);

foreach ($events_list as $event) {
  echo $event->event_name;
  echo "<br>";
  echo $event->begin_date;
  echo "<br>";
  echo $event->begin_hour;
  echo "<br>";
  echo $event->adress;
  echo "<br>";
  echo $event->zip_code;
  echo "<br>";
  echo $event->city;
  echo "<br>";
  echo $event->latitude;
  echo "<br>";
  echo $event->longitude;
  echo "<br>";
  echo $event->place_nb;
  echo "<br>";
  echo $event->place_taken;
  echo "<br>";
  echo "<br>";
}

//
//
// $json = array(
//   'test'=> $caca,
//
// );

// echo json_encode($json);
die();
