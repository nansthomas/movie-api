<?php

header('Content-Type: application/json');

use App\Events\getEvents;

$events = new getEvents();
// $events_list = $events->listEvent();

$events = array(
  'type' => 'FeatureCollection',
  'features' => array(),
);

foreach ($events_list as $event) {

  $json = array(
    'type' => 'Feature',
    'geometry'=> array(
      'type'=> 'Point',
      'coordinates' => array(
        $event->latitude,
        $event->longitude
      )
    ),

    'properties' => array(
      'name' => $event->event_name,
      'cover' => 'https://resizing.flixster.com/bBiINc0J64btBDSR5_HGxL5iE1o=/800x1184/v1.bTsxMTQyMDkxNDtqOzE3MDExOzIwNDg7MTAwMDsxNDgw',
      'address' => $event->adress,
      'city' => $event->city,
      'country' => 'France',
      'postalCode' => $event->zip_code,
      'date' => $event->begin_date,
      'hour' => $event->begin_hour,
    )
  );

  $events['features'][] = $json;
}

echo json_encode($events);
die();
