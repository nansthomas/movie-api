<?php

$menuStyle = '';
$logoStyle = 'black';
$title = 'Explore';


if (array_key_exists('city', $_GET)) {
  $city = '&city='. $_GET['city'];
} else {
  $city = '&city=';
}

if (array_key_exists('date', $_GET)) {
  $date = '&date='. $_GET['date'];
} else {
  $date = '&date=';
}

if (array_key_exists('event_name', $_GET)) {
  $event_name = '?event_name='. $_GET['event_name'];
} else {
  $event_name = '?event_name=';
}
