<?php

$title = 'Modération';
$class = 'adminevent';

$event_id = $_GET['para_id'];

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