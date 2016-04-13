<?php  

$query = $_GET['query'];

use App\Movies\getMovie;
$movie = new getMovie();

$movie_result = $movie->searchMovie($query);

echo json_encode($movie_result);