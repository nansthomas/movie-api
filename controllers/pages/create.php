<?php

$title = 'Création d\'une séance';
$class = 'creation';

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
		  'city' => '',
		  'zip_code' => '',
		  'setup_display' => '',
		  'setup_sound' => '',
		  'place_nb' => '',
		  'supp_info' => '');

if(!empty($_POST))
{
	// Set variables
	$form_data->event_name 	  = trim($_POST['event_name']);
	$form_data->begin_date    = trim($_POST['begin_date']);
	$form_data->begin_hour    = trim($_POST['begin_hour']);
	$form_data->description   = trim($_POST['description']);
	$form_data->movie_name    = trim($_POST['movie_name']);
	$form_data->adress        = trim($_POST['adress']);
	$form_data->city          = trim($_POST['city']);
	$form_data->zip_code      = trim($_POST['zip_code']);
	$form_data->setup_display = trim($_POST['setup_display']);
	$form_data->setup_sound   = trim($_POST['setup_sound']);
	$form_data->place_nb      = trim($_POST['place_nb']);
	$form_data->supp_info     = trim($_POST['supp_info']);

	// FINAL VER - CHECK ERRORS

	if (empty($errors))
    {
    	$movie->createEvent($form_data);
	    // 2ND INSERT
	    // Take useful info for the insert
	    $user_id = $_SESSION['user_id'];
	    $event_id = $pdo->pdo->lastInsertId();

	    $movie->insertIntoOrganized($user_id, $event_id);

	    // 3RD INSERT
    	// API call to search for the movie ID
		$movie_result = $movie->searchMovie($movie_name);
		$movie_id = $movie_result->id;
		$movie_name = $movie_result->title;

		$movie->insertEventMovie($movie_id, $event_id, $movie_name);

    }

    $movieid = $movie->searchMovieId($movie_name);

}
