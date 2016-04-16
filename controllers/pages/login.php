<?php

$menuStyle = 'transparent';
$logoStyle = 'white';
$title = 'Join Us';

if (!empty($_SESSION['user_id'])) {
  header('Location: ./');
  exit;
}
