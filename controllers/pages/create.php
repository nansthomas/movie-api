<?php

$user_id = empty($_SESSION['user_id']) ? null : $_SESSION['user_id'];

if ($user_id == NULL) {
  header('Location: ./login');
  exit;
}


$menuStyle = '';
$logoStyle = 'black';
$title = 'Création d\'une séance';

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

// Instantiaze variable for the form
$form_data = (object)
	array('event_name' => null,
		  'begin_date' => null,
		  'begin_hour' => null,
		  'description' => null,
		  'movie_name' => null,
		  'adress' => null,
		  'setup_display' => null,
		  'setup_sound' => null,
		  'place_nb' => null,
		  'supp_info' => null,
		  'movie_id' => null);

foreach ($form_data as $key => $value) {
		$errors->$key = null;
}

if(!empty($_POST))
{
	// Set variables
	$form_data->event_name 	  = mysql_real_escape_string(trim($_POST['event_name']));
	$form_data->begin_date    = trim($_POST['begin_date']);
	$form_data->begin_hour    = trim($_POST['begin_hour']);
	$form_data->description   = mysql_real_escape_string(trim($_POST['description']));
	$form_data->movie_name    = mysql_real_escape_string(trim($_POST['movie_name']));
	$form_data->label         = mysql_real_escape_string(trim($_POST['label']));
	$form_data->setup_display = trim($_POST['setup_display']);
	$form_data->setup_sound   = trim($_POST['setup_sound']);
	$form_data->place_nb      = trim($_POST['place_nb']);
	$form_data->supp_info     = mysql_real_escape_string(trim($_POST['supp_info']));
	$form_data->movie_id      = trim($_POST['movie_id']);

	echo '<pre>';
	print_r($form_data);
	echo '</pre>';


	// FINAL VER - CHECK ERRORS
	foreach ($form_data as $key => $value) {
		if (!isset($form_data->$key)) {
			$errors->$key = true;
			$errors->exist = true;
		}
		else
			$errors->$key = false;
	}

	if (!preg_match('/^[a-zA-Z0-9_-]{6,}$/', $form_data->event_name)) {
		$errors->event_name = true;
		$errors->exist = true;
	}

	if ($form_data->begin_date <= $today) {
		$errors->begin_date = true;
		$errors->exist = true;
	}

	if ($form_data->setup_display != ('tv' || 'pc' || 'projecteur')) {
		$errors->setup_display = true;
		$errors->exist = true;
	}
	else {
		$errors->setup_display = false;
	}

	if ($form_data->setup_sound != ('natif' || 'hq' || 'bq')) {
		$errors->setup_display = true;
		$errors->exist = true;
	}
	else {
		$errors->setup_display = false;
	}

	if (3 < $form_data->place_nb) {
		$errors->place_nb = false;
	}
	else {
		$errors->place_nb = true;
		$errors->exist = true;
	}

	if ($form_data->label == '') {
		$errors->label = true;
		$errors->exist = true;
	}

	if ($form_data->movie_id == '') {
		$errors->movie_name = true;
		$errors->exist = true;
	}

	if (!$errors->exist)
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
		$event->insertEventMovie($form_data->movie_id, $event_id, $movie_name, $poster_path, $backdrop_path);
    }
}

	echo '<pre>';
	var_dump($errors);
	echo '</pre>';
