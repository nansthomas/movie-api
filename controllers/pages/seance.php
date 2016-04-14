<?php

use App\Movies\getMovie;
$movie = new getMovie();

function convertToHoursMins($time, $format = '%02d:%02d') {
    if ($time < 1) {
        return;
    }
    $hours = floor($time / 60);
    $minutes = ($time % 60);
    return sprintf($format, $hours, $minutes);
}

$menuStyle = 'transparent';
$logoStyle = 'white';
$title = 'Page de l\'évênement';


$event_id = $_GET['event_id'];
$user_id = empty($_SESSION['user_id']) ? null : $_SESSION['user_id'];

// Get organisator and event info
$query = "SELECT users.*, events.*
		  FROM users, events, organized
		  WHERE events.event_id = $event_id
		  AND events.event_id = organized.event_id
		  AND organized.user_id = users.user_id";

$event_info = $pdo->select($query);

// Get movie detail
$query = "SELECT *
		  FROM event_movies
		  WHERE event_id = $event_id";

$movie_list = $pdo->select($query);

// Get the list of attending person
$query = "SELECT *
		  FROM users,attend,events
		  WHERE events.event_id = $event_id
		  AND attend.event_id = events.event_id
		  AND attend.user_id = users.user_id";

$attend_list = $pdo->select($query);

// User status concerning a certain event
$query = "SELECT *
		  FROM attend
		  WHERE event_id = $event_id
		  AND user_id = $user_id";

$user_status = $pdo->select($query);

$movie_detail = $movie->getMovieDetailInfo($movie_list[0]->movie_id);
$movie_detail->runtime = convertToHoursMins($movie_detail->runtime);
