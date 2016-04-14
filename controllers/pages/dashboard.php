<?php

use App\Events\getEvents;

$user_id = empty($_SESSION['user_id']) ? null : $_SESSION['user_id'];

if ($user_id == NULL) {
  header('Location: ./login');
  exit;
}

$title = 'Création d\'un évênement';
$class = 'dashboard';

$user_id = empty($_SESSION['user_id']) ? null : $_SESSION['user_id'];

if ($user_id == NULL) {
  header('Location: ./login');
  exit;
}

$get_event = new getEvents();

$event_created = $get_event->userEvent($user_id);
$accepted_event = $get_event->acceptedEvent($user_id);
$pending_event = $get_event->pendingEvent($user_id);
