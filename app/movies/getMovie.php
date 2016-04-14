<?php

namespace App\Movies;

class getMovie {

  function __construct () {
    // FUTUR : ADD THE LANGUAGE
  }

  private function get_http_response_code($url) {
      $headers = get_headers($url);
      return substr($headers[0], 9, 3);
  }

  private function parseQuery($query){
    $query = str_replace(' ', '+', $query);
    return $query;
  }

  private function convertToHoursMins($time, $format = '%02d:%02d') {
      if ($time < 1) {
          return;
      }
      $hours = floor($time / 60);
      $minutes = ($time % 60);
      return sprintf($format, $hours, $minutes);
  }

  public function searchMovie($search_query) {
    $search_query = $this->parseQuery($search_query);
  	$url = 'https://api.themoviedb.org/3/search/movie?query='.$search_query.'&language=fr&api_key='.API_KEY;

  	if ($this->get_http_response_code($url) == '200') {
  		// Execute if the summoner was found
  		$data = file_get_contents($url);
  		$data = json_decode($data);
      $data = $data->results;
  	} else {
  		// Else, false
  		$data = false;
  	}

  	return $data;
  }

  public function getMovieDetailInfo($movie_id) {
    $url = 'http://api.themoviedb.org/3/movie/'.$movie_id.'?language=fr&api_key='.API_KEY;

    if ($this->get_http_response_code($url) == '200') {
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
}
