<?php 

$title = 'Création d\'une séance';
$class = 'creation';

function get_http_response_code($url) {
    $headers = get_headers($url);
    return substr($headers[0], 9, 3);
}

function getMovieId($search_query) {
	$url = 'https://api.themoviedb.org/3/search/movie?query='.$search_query.'&language=fr&api_key='.API_KEY;
	
	if (get_http_response_code($url) == '200') {
		// Execute if the summoner was found
		$data = file_get_contents($url);
		$data = json_decode($data);
	}
	else {
		// Else, false
		$data = false;
	}

	return $data->results[0]->id;
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

        try {
		    $pdo->beginTransaction();
		 
		    // 1ST INSET
	    	$query = 'INSERT INTO events (event_name,begin_date,begin_hour,description,adress,city,zip_code,setup_display,setup_sound,places_nb,supp_info)
	        		  VALUES(:event_name,:begin_date,:begin_hour,:description,:adress,:city,:zip_code,:setup_display,:setup_sound,:places_nb,:supp_info)';
	        $prepare = $pdo->prepare($query);

	        $prepare->bindValue('event_name',$event_name);
	        $prepare->bindValue('begin_date',$begin_date);
	        $prepare->bindValue('begin_hour',$begin_hour);
	        $prepare->bindValue('description',$description);
	        $prepare->bindValue('adress',$adress);
	        $prepare->bindValue('city',$city);
	        $prepare->bindValue('zip_code',$zip_code);
	        $prepare->bindValue('setup_display',$setup_display);
	        $prepare->bindValue('setup_sound',$setup_sound);
	        $prepare->bindValue('places_nb',$places_nb);
	        $prepare->bindValue('supp_info',$supp_info);

		    if (!$prepare->execute())
		        throw new PDOException('Erreur requête 1');

		    // 2ND INSERT
		    // Take useful info for the insert
		    $user_id = $_SESSION['user_id'];
		    $event_id = $pdo->lastInsertId();

	    	$query = 'INSERT INTO organized (user_id, event_id)
	        		  VALUES(:user_id, :event_id)';
	        $prepare = $pdo->prepare($query);

	        $prepare->bindValue('user_id',$user_id);
	        $prepare->bindValue('event_id',$event_id);

		    if (!$prepare->execute())
		        throw new PDOException('Erreur requête 2');

		    // 3RD INSERT
	    	// API call to search for the movie ID
    		$movie_id = getMovieId($movie_name);

		    $query = 'INSERT INTO event_movies (movie_id, event_id)
	        		  VALUES(:movie_id, :event_id)';
	        $prepare = $pdo->prepare($query);

	        $prepare->bindValue('movie_id',$movie_id);
	        $prepare->bindValue('event_id',$event_id);

	        if (!$prepare->execute())
		        throw new PDOException('Erreur requête 3');

		    $pdo->commit();
		}
		catch(PDOException $e) {
		    $pdo->rollback();
		    echo $e->getMessage();
		}
    }
}