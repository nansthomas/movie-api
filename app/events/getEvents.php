<?php

namespace App\Events;

use App\Config\Database;

class getEvents extends Database {

  function __construct () {

  }

  public function listEvent () {

    if (array_key_exists('user_id', $_SESSION)) {
    	$user_id = $_SESSION['user_id'];

    	$query = "SELECT events.*, users.* FROM events, users, organized
                WHERE events.event_id = organized.event_id AND users.user_id = organized.user_id
                AND events.place_nb > events.place_taken AND users.user_id != $user_id";
    } else {

    	$query = "SELECT events.*, users.* FROM events, users, organized
                WHERE events.event_id = organized.event_id
    		        AND users.user_id = organized.user_id
    		  	    AND events.place_nb > events.place_taken";
    }

    $events_list = $this->select($query);

    return $events_list;

  }

}
