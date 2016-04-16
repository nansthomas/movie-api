<?php

namespace App\Adress;

class getAdress {

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

  public function searchAdress($search_query) {
    $search_query = $this->parseQuery($search_query);
    $url = 'http://api-adresse.data.gouv.fr/search/?q='.$search_query;
    
    if ($this->get_http_response_code($url) == '200') {
      // Execute if the summoner was found
      $data = file_get_contents($url);
      $data = json_decode($data);
    } else {
      // Else, false
      $data = false;
    }

    return $data;
  }
}
