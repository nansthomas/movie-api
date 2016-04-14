<?php

$user_id = empty($_SESSION['user_id']) ? null : $_SESSION['user_id'];

if ($user_id == NULL) {
  header('Location: ./login');
  exit;
}

$menuStyle = 'transparent';
$logoStyle = 'white';
$title = 'Envoie en cours';

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
$today = date('Y-m-d');
$time = date('H:i', strtotime('+1 hour'));
$errors = false;

// Instantiaze variable for the form
$form_data = (object)
	array('event_name' => null,
		  'begin_date' => null,
		  'begin_hour' => null,
		  'description' => null,
		  'movie_name' => null,
		  'label' => null,
		  'setup_display' => null,
		  'setup_sound' => null,
		  'place_nb' => null,
		  'movie_id' => null);


;
if(!empty($_POST))
{
	// Set variables
	$form_data->event_name 	  = trim($_POST['event_name']);
	$form_data->event_name    = htmlspecialchars($form_data->event_name, ENT_QUOTES, 'UTF-8');
	$form_data->begin_date    = trim($_POST['begin_date']);
	$form_data->begin_hour    = trim($_POST['begin_hour']);
	$form_data->description   = trim($_POST['description']);
	$form_data->description   = htmlspecialchars($form_data->description, ENT_QUOTES, 'UTF-8');
	$form_data->movie_name    = trim($_POST['movie_name']);
	$form_data->movie_name    = htmlspecialchars($form_data->movie_name, ENT_QUOTES, 'UTF-8');
	$form_data->label         = trim($_POST['label']);
	$form_data->label         = htmlspecialchars($form_data->label, ENT_QUOTES, 'UTF-8');
	$form_data->setup_display = trim($_POST['setup_display']);
	$form_data->setup_sound   = trim($_POST['setup_sound']);
	$form_data->place_nb      = trim($_POST['place_nb']);
	$form_data->movie_id      = trim($_POST['movie_id']);

	// FINAL VER - CHECK ERRORS
	foreach ($form_data as $key => $value) {
		if (!isset($form_data->$key)) {
			$errors = true;
			echo "find in foeach";
		}
	}

	// if (!preg_match('/^(\\s+[A-Za-z,;\'\"\\s.?!]){5,}$/', $form_data->event_name)) {
	// 	$errors = true;
	// 	echo "2";
	// }

	if ($form_data->begin_date <= $today) {
		$errors = true;
	}

	// if (!preg_match('/^(\\s+[A-Za-z,;\'\"\\s]+[.?!])$/', $form_data->description)) {
	// 	$errors = true;
	// }

	if (1 >= $form_data->place_nb) {
		$errors = true;
	}

	if (empty($event->getLocalisation($form_data->label))) {
		$errors = true;
	}

	if ($form_data->setup_display != ('tv' || 'pc' || 'projecteur')) {
		$errors = true;
	}

	if ($form_data->setup_sound != ('natif' || 'hq' || 'bq')) {
		$errors = true;
	}

	if ($form_data->movie_id == '') {
		$errors = true;
	}

	if (!$errors)
    {
    	$user_id = $_SESSION['user_id'];
    	$event_id = $event->createEvent($form_data);

		if ($event_id === FALSE) {
			die('ERROR !!');
		}

	    $event->insertIntoOrganized($user_id, $event_id);
	    $localisation = $event->getLocalisation($form_data->label);
	    $event->updateLocalisation($localisation, $event_id);
    	$movie_detail = $movie->getMovieDetailInfo($form_data->movie_id);

		$movie_name = $movie_detail->title;
		$poster_path = $movie_detail->poster_path;
		$backdrop_path = $movie_detail->backdrop_path;

		// Insert into DB
		$exec = $event->insertEventMovie($form_data->movie_id, $event_id, $movie_name, $poster_path, $backdrop_path);

		if ($exec) {
		  	header('Location: ./dashboard');
		  	exit;
		} else {
			header('Location: ./create');
		  	exit;
		}
    }
}