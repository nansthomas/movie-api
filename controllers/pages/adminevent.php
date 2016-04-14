<?php

$user_id = empty($_SESSION['user_id']) ? null : $_SESSION['user_id'];

if ($user_id == NULL) {
  header('Location: ./login');
  exit;
}

$title = 'Modération';
$class = 'adminevent';

$event_id = $_GET['event_id'];

$query = "SELECT *
          FROM users, attend
          WHERE users.user_id = attend.user_id
          AND attend.event_id = $event_id
          AND attend.is_accepted IS NULL";
$waiting_list = $pdo->select($query);


$query = "SELECT *
          FROM users, attend
          WHERE users.user_id = attend.user_id
          AND attend.event_id = $event_id
          AND attend.is_accepted = 1";
$comfirmed_list = $pdo->select($query);