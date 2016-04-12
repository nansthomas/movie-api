<?php

function convertToHoursMins($time, $format = '%02d:%02d') {
    if ($time < 1) {
        return;
    }
    $hours = floor($time / 60);
    $minutes = ($time % 60);
    return sprintf($format, $hours, $minutes);
}

function get_http_response_code($url) {
    $headers = get_headers($url);
    return substr($headers[0], 9, 3);
}

function getMovieDetailInfo($movie_id) {
	$url = 'http://api.themoviedb.org/3/movie/'.$movie_id.'?language=fr&api_key='.API_KEY;
	
	if (get_http_response_code($url) == '200') {
		// Execute if the summoner was found
		$data = file_get_contents($url);
		$data = json_decode($data);
	}
	else {
		// Else, false
		$data = false;
	}

	return $data;
}

$title = 'Page de l\'évênement';
$class = 'seance';

$event_id = $_GET['event_id'];
$user_id = $_SESSION['user_id'];

// Get organisator and event info
$query = "SELECT users.*, events.*
		  FROM users, events, organized
		  WHERE events.event_id = $event_id
		  AND events.event_id = organized.event_id
		  AND organized.user_id = users.user_id";

$prepare = $pdo->prepare($query);

// Get movie detail
$query = 'SELECT *
		  FROM event_movies
		  WHERE event_id = :event_id';
$prepare = $pdo->prepare($query);

$prepare->bindValue('event_id',$event_id);
$prepare->execute();
$movie_list = $prepare->fetchAll();

// User status concerning a certain event
$query = 'SELECT *
		  FROM attend
		  WHERE event_id = :event_id
		  AND user_id = :user_id';
$prepare = $pdo->prepare($query);

$prepare->bindValue('event_id',$event_id);
$prepare->bindValue('user_id',$user_id);
$prepare->execute();

$user_status = $prepare->fetchAll();

$movie_detail = getMovieDetailInfo($movie_list[0]->movie_id);
$movie_detail->runtime = convertToHoursMins($movie_detail->runtime);

