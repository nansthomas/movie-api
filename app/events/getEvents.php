<?php

namespace App\Events;

use App\Config\Database;

class getEvents extends Database {

  function __construct () {

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

        	$query = "SELECT events.*, users.*  FROM events, users, organized
                    WHERE events.event_id = organized.event_id
                    AND users.user_id = organized.user_id
                    AND events.place_nb > events.place_taken
                    AND users.user_id != $user_id"
                    .$city_query
                    .$date_query
                    .$event_name_query;
        } else {

        	$query = "SELECT events.*, users.* FROM events, users, organized
                    WHERE events.event_id = organized.event_id
        		    AND users.user_id = organized.user_id
        		    AND events.place_nb > events.place_taken"
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
        $query = "INSERT INTO events (event_name,begin_date,begin_hour,description,adress,setup_display,setup_sound,place_nb,supp_info)
                  VALUES('$data->event_name','$data->begin_date','$data->begin_hour','$data->description','$data->adress',
                         '$data->setup_display','$data->setup_sound','$data->place_nb','$data->supp_info')";
        $prepare = $pdo->prepareQuery($query);
        return $prepare;
    }

    public function insertIntoOrganized($user_id, $event_id) {
        $query = "INSERT INTO organized (user_id, event_id)
                  VALUES($user_id, $event_id)";
        $prepare = $pdo->prepareQuery($query);
        return $prepare;
    }

    public function insertEventMovie($movie_id, $event_id, $movie_name) {
        $query = "INSERT INTO event_movies (movie_id, event_id, movie_name)
                  VALUES($movie_id, $event_id, $movie_name)";
        $prepare = $pdo->prepareQuery($query);
        return $prepare;
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
}
