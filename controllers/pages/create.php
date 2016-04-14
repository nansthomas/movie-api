<?php

$title = 'Création d\'une séance';
$class = 'creation';

use App\Movies\getMovie;
use App\Events\getEvents;

$movie = new getMovie();
$event = new getEvents();

function convertToHoursMins($time, $format = '%02d:%02d') {
    if ($time < 1) {
        return;
    }
    $hours = floor($time / 60);
    $minutes = ($time % 60);
    return sprintf($format, $hours, $minutes);
}

// Instantiaze errors array
$errors   = array();
$today = date('Y-m-d');
$time = date('H:i', strtotime('+1 hour'));

// Instantiaze variable for the form
$form_data = (object)
	array('event_name' => '',
		  'begin_date' => '',
		  'begin_hour' => '',
		  'description' => '',
		  'movie_name' => '',
		  'adress' => '',
		  'setup_display' => '',
		  'setup_sound' => '',
		  'place_nb' => '',
		  'supp_info' => '',
		  'movie_id' => '');

if(!empty($_POST))
{
	// Set variables
	$form_data->event_name 	  = trim($_POST['event_name']);
	$form_data->begin_date    = trim($_POST['begin_date']);
	$form_data->begin_hour    = trim($_POST['begin_hour']);
	$form_data->description   = trim($_POST['description']);
	$form_data->movie_name    = trim($_POST['movie_name']);
	$form_data->adress        = trim($_POST['adress']);
	$form_data->setup_display = trim($_POST['setup_display']);
	$form_data->setup_sound   = trim($_POST['setup_sound']);
	$form_data->place_nb      = trim($_POST['place_nb']);
	$form_data->supp_info     = trim($_POST['supp_info']);
	$form_data->movie_id      = trim($_POST['movie_id']);

	// FINAL VER - CHECK ERRORS
	if (empty($errors))
    {
    	$user_id = $_SESSION['user_id'];
    	$event_id = $event->createEvent($form_data);
		if ($event_id === FALSE) {
			die('ERROR !!');
		}    	

	    $event->insertIntoOrganized($user_id, $event_id);

	    $localisation = $event->getLocalisation($form_data->adress,$event_id);
	    $event->updateLocalisation($localisation, $event_id);
	    // 3RD INSERT
    	// API call to search for the movie ID
    	$movie_detail = $movie->getMovieDetailInfo($form_data->movie_id);

		$movie_name = $movie_detail->title;
		$poster_path = $movie_detail->poster_path;
		$backdrop_path = $movie_detail->backdrop_path;

		// Insert into DB
		$event->insertEventMovie($form_data->movie_id, $event_id, $movie_name, $poster_path, $backdrop_path);
    }

}
