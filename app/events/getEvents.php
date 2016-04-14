<?php

namespace App\Events;

use App\Config\Database;

class getEvents extends Database {

  function __construct () {

  }
  private function get_http_response_code($url) {
      $headers = get_headers($url);
      return substr($headers[0], 9, 3);
  }

  private function parseQuery($query){
    $query = str_replace(' ', '+', $query);
    return $query;
  }

    public function listEvent ($city, $event_name, $date) {
        if ($city != null)
            $city_query = " AND events.city = '$city' ";
        else
            $city_query = " ";

        if ($date != null)
            $date_query = " AND events.begin_date = '$date' ";
        else
            $date_query = " ";

        if ($event_name != null)
            $event_name_query = " AND events.event_name LIKE '%$event_name%' ";
        else
            $event_name_query = " ";

        if (array_key_exists('user_id', $_SESSION)) {
        	$user_id = $_SESSION['user_id'];

        	$query = "SELECT events.*, users.*, event_movies.*  FROM events, users, organized, event_movies
                    WHERE events.event_id = organized.event_id
                    AND users.user_id = organized.user_id
                    AND events.place_nb > events.place_taken
                    AND events.event_id = event_movies.event_id
                    AND users.user_id != $user_id"
                    .$city_query
                    .$date_query
                    .$event_name_query;
        } else {

        	$query = "SELECT events.*, users.*, event_movies.*  FROM events, users, organized, event_movies
                    WHERE events.event_id = organized.event_id
                    AND users.user_id = organized.user_id
                    AND events.place_nb > events.place_taken
                    AND events.event_id = event_movies.event_id"
                    .$city_query
                    .$date_query
                    .$event_name_query;
        }

        $events_list = $this->select($query);

        if (empty($events_list)) {
            $events_list = false;
        }

        return $events_list;
    }

    // Create event
    public function createEvent ($data) {
        $query = "INSERT INTO events (event_name,begin_date,begin_hour,description,label,setup_display,setup_sound,place_nb,supp_info)
                  VALUES('$data->event_name','$data->begin_date','$data->begin_hour','$data->description','$data->label',
                         '$data->setup_display','$data->setup_sound','$data->place_nb','$data->supp_info')";
        $prepare = $this->prepareQuery($query);

        return $prepare;
    }

    public function insertIntoOrganized($user_id, $event_id) {
        $query = "INSERT INTO organized (user_id, event_id)
                  VALUES($user_id, $event_id)";
        $exec = $this->prepareQuery($query);
        return $exec;
    }

    public function insertEventMovie($movie_id, $event_id, $movie_name, $poster_path, $backdrop_path) {
        $query = "INSERT INTO event_movies (movie_id,event_id,movie_name,poster_path,backdrop_path)
                  VALUES('$movie_id','$event_id','$movie_name','$poster_path','$backdrop_path')";

        $exec = $this->prepareQuery($query);
        return $exec;
    }

    // Query for event that the user created
    public function userEvent($user_id) {

        $query = "SELECT *
                  FROM events,organized
                  WHERE events.event_id = organized.event_id
                  AND organized.user_id = $user_id";
        $prepare = $this->select($query);
        return $prepare;
    }

    // Query for event that the user want to attend and are alreay accepted
    public function acceptedEvent($user_id) {
        $query = "SELECT *
                  FROM events,attend
                  WHERE events.event_id = attend.event_id
                  AND attend.user_id = $user_id
                  AND attend.is_accepted = 1";
        $prepare = $this->select($query);
        return $prepare;
    }

    // Query for event that the user want to attend and are still pending
    public function pendingEvent($user_id) {
        $query = "SELECT *
                  FROM events,attend
                  WHERE events.event_id = attend.event_id
                  AND attend.user_id = $user_id
                  AND attend.is_accepted IS NULL";
        $prepare = $this->select($query);
        return $prepare;
    }

    // to know attend info of a specific user for a specific event
    public function getAttendInfo ($user_id, $event_id) {
        $query = "SELECT *
                  FROM attend
                  WHERE user_id = $user_id
                  AND event_id = $event_id";
        $prepare = $this->select($query);
        return $prepare[0];
    }

    // Update is_accepted status
    public function setIsAccepted ($user_id,$event_id,$bool) {
        $query = "UPDATE attend
                  SET is_accepted = $bool
                  WHERE user_id = $user_id
                  AND event_id = $event_id";
        $prepare = $this->prepareQuery($query);
        return $prepare;
    }

    public function updateEventPlaces($event_id, $isConfirmed) {
      if ($isConfirmed == 1) {
        $query = "UPDATE events
                  SET pending_request = pending_request - 1,
                      place_taken = place_taken + 1
                  WHERE event_id = $event_id";
      } else {
        $query = "UPDATE events
                  SET pending_request = pending_request - 1,
                  WHERE event_id = $event_id";
      }
      $prepare = $this->prepareQuery($query);

      return $prepare;
    }

    public function getLocalisation($label) {
      $label = $this->parseQuery($label);
      $url = 'http://api-adresse.data.gouv.fr/search/?q='.$label;

      if ($this->get_http_response_code($url) == '200') {
        // Execute if the summoner was found
        $data = file_get_contents($url);
        $data = json_decode($data);
        $data = $data->features[0];
      } else {
        // Else, false
        $data = false;
      }

      return $data;

    }

    public function updateLocalisation($localisation, $event_id) {
      $latitude = $localisation->geometry->coordinates[0];
      $longitude = $localisation->geometry->coordinates[1];
      if (property_exists($localisation,'housenumber')){
        $house_number = $localisation->properties->housenumber;
      }
      else {
        $house_number = NULL;
      }
      if (property_exists($localisation,'street')){
        $street = $localisation->properties->street;
      }
      else {
        $street = NULL;
      }
      $city = $localisation->properties->city;
      $zip_code = $localisation->properties->postcode;

      $query = "UPDATE events
                SET latitude = '$latitude',
                    longitude = '$longitude',
                    house_number = '$house_number',
                    street = '$street',
                    city = '$city',
                    zip_code = '$zip_code'
                WHERE event_id = $event_id";

      $prepare = $this->prepareQuery($query);
      return $prepare;
    }
}
