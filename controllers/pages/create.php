<?php

$user_id = empty($_SESSION['user_id']) ? null : $_SESSION['user_id'];

if ($user_id == NULL) {
  header('Location: ./login');
  exit;
}

$menuStyle = 'transparent';
$logoStyle = 'white';
$title = 'Création d\'une séance';

use App\Movies\getMovie;
use App\Events\getEvents;

$movie = new getMovie();
$event = new getEvents();

function convertToHoursMins($time, $format = '%02d:%02d') {
    if ($time < 1) {
        return;
    }
    $hours = floor($time / 60);
    $minutes = ($time % 60);
    return sprintf($format, $hours, $minutes);
}

// Instantiaze errors array
$today = date('Y-m-d');
$time = date('H:i', strtotime('+1 hour'));