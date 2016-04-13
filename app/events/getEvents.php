<?php

namespace App\Events;

use App\Config\Database;

class getEvents extends Database {

  function __construct () {

  }

  public function listEvent ($city, $event_name) {
    if ($city != null)
        $city_query = " AND events.city = '$city'";
    else
        $city_query = "";

    if ($event_name != null)
        $event_name_query = " AND events.event_name LIKE '%$event_name%'";
    else
        $event_name_query = "";

    if (array_key_exists('user_id', $_SESSION)) {
    	$user_id = $_SESSION['user_id'];

    	$query = "SELECT events.*, users.*  FROM events, users, organized
                WHERE events.event_id = organized.event_id
                AND users.user_id = organized.user_id
                AND events.place_nb > events.place_taken
                AND users.user_id != $user_id"
                .$city_query
                .$event_name_query;
    } else {

    	$query = "SELECT events.*, users.* FROM events, users, organized
                WHERE events.event_id = organized.event_id
    		    AND users.user_id = organized.user_id
    		    AND events.place_nb > events.place_taken"
                .$city_query
                .$event_name_query;
    }

    $events_list = $this->select($query);

    return $events_list;

  }

}
