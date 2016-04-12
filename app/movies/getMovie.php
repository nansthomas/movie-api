<?php

namespace App\Movies;

class getMovie {

  function __construct ($pdo) {
    // FUTUR : ADD THE LANGUAGE
    $this->pdo = $pdo;
  }

  private function get_http_response_code($url) {
      $headers = get_headers($url);
      return substr($headers[0], 9, 3);
  }

  public function getMovieId($search_query) {
  	$url = 'https://api.themoviedb.org/3/search/movie?query='.$search_query.'&language=fr&api_key='.API_KEY;

  	if (get_http_response_code($url) == '200') {
  		// Execute if the summoner was found
  		$data = file_get_contents($url);
  		$data = json_decode($data);
      $data->results[0]->id;
  	} else {
  		// Else, false
  		$data = false;
  	}

  	return $data;
  }

}
