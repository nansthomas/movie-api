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
$place_nb      = '';
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
	$place_nb      = trim($_POST['place_nb']);
	$supp_info     = trim($_POST['supp_info']);

	// FINAL VER - CHECK ERRORS

	if (empty($errors))
    {
	    // 1ST INSERT
    	$query = "INSERT INTO events (event_name,begin_date,begin_hour,description,adress,city,zip_code,setup_display,setup_sound,place_nb,supp_info)
        		  VALUES('$event_name','$begin_date','$begin_hour','$description','$adress','$city','$zip_code','$setup_display','$setup_sound','$place_nb','$supp_info')";
        $prepare = $pdo->prepareQuery($query);

	    // 2ND INSERT
	    // Take useful info for the insert
	    $user_id = $_SESSION['user_id'];
	    $event_id = $pdo->pdo->lastInsertId();

    	$query = "INSERT INTO organized (user_id, event_id)
        		  VALUES($user_id, $event_id)";
        $prepare = $pdo->prepareQuery($query);

	    // 3RD INSERT
    	// API call to search for the movie ID
		$movie_id = $movie->getMovieId($movie_name);

	    $query = "INSERT INTO event_movies (movie_id, event_id)
        		  VALUES($movie_id, $event_id)";
        $prepare = $pdo->prepareQuery($query);

	    // 4RTH UPDATE - EVENT DURATION
	    $movie_info = $movie->getMovieDetailInfo($movie_id);
	    $delay = 10; // In minute

	    $approximate_duration = $movie_info->runtime + $delay;
	    $approximate_duration = convertToHoursMins($approximate_duration);

	    $query = "UPDATE events
        		  SET approximate_duration = $approximate_duration
        		  WHERE event_id = $event_id";
        $prepare = $pdo->prepareQuery($query);
    }

    $movie = new getMovie($pdo);
    $movieid = $movie->getMovieId($movie_name);

}
