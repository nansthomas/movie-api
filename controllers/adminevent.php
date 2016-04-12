<?php

$title = 'Modération';
$class = 'adminevent';

$event_id = $_GET['para_id'];

$query = "SELECT *
          FROM users, attend
          WHERE users.user_id = attend.user_id
          AND attend.event_id = $event_id
          AND attend = null";
$waiting_list = $pdo->select($query);

$query = "SELECT *
          FROM users, attend
          WHERE users.user_id = attend.user_id
          AND attend.event_id = $event_id
          AND attend = yes";
$comfirmed_list = $pdo->select($query);

