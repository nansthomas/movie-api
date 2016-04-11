<?php 

$title = 'Création d\'une séance';
$class = 'creation';

// Instantiaze errors array
$errors   = array();
$today = date('Y-m-d');
$time = date('H:i', strtotime('+1 hour'));

// Instantiaze variable for the form
$event_name    = '';
$begin_date    = '';
$begin_hour    = '';
$description   = '';
$movie_name    = ''; // SHOULD BE AN ARRAY IN THE FINAL VER
$adress        = '';
$city          = '';
$zip_code      = '';
$setup_display = '';
$setup_sound   = '';
$places_nb     = '';
$supp_info     = '';

if(!empty($_POST))
{
	// Set variables
	$event_name    = trim($_POST['event_name']);
	$begin_date    = trim($_POST['begin_date']);
	$begin_hour    = trim($_POST['begin_hour']);
	$description   = trim($_POST['description']);
	$movie_name    = trim($_POST['movie_name']);
	$adress        = trim($_POST['adress']);
	$city          = trim($_POST['city']);
	$zip_code      = trim($_POST['zip_code']);
	$setup_display = trim($_POST['setup_display']);
	$setup_sound   = trim($_POST['setup_sound']);
	$places_nb     = trim($_POST['places_nb']);
	$supp_info     = trim($_POST['supp_info']);

	// FINAL VER - CHECK ERRORS

	if (empty($errors))
    {
    	// STILL NEED APPROXIMATE_DURATION AND MOVIE ID
    	// API call to search for the movie ID
    	// https://api.themoviedb.org/3/search/movie?query=Le+seigneur+des+anneaux&api_key=68de9badcc3e5abc7c2530d213a503e9&language=fr
    	// $movie_name

    }
}