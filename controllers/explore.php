<?php 

$title = 'Explore';
$class = 'explore';

$user_id = $_SESSION['user_id'];

$query = 'SELECT events.*, users.*
		  FROM events, users, organized
		  WHERE events.event_id = organized.event_id
		  AND users.user_id = organized.user_id
		  AND events.places_nb > events.place_taken
		  AND users.user_id != :user_id';
$prepare = $pdo->prepare($query);

$prepare->bindValue('user_id',$user_id);
$prepare->execute();
$events_list = $prepare->fetchAll();