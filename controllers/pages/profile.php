<?php

$menuStyle = 'transparent';
$logoStyle = 'white';
$title = 'Profil';

use App\Facebook\RegisterFacebook;
use App\Events\getEvents;

$title = $_SESSION['first_name'].' '.$_SESSION['last_name'];
$user_id = $_GET['user_id'];

$u = new RegisterFacebook();
$event = new getEvents();
$user_info = $u->displayUser($user_id);
$user_event = $event->userEvent($user_id);
$participated_event = $event->participatedEvent($event_id, $user_id);
