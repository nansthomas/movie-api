<?php

$title = 'Explore';
$class = 'explore';


if (array_key_exists('city', $_GET))
	$city = $_GET['city'];
else
	$city = '';

if (array_key_exists('event_name', $_GET))
	$event_name = $_GET['event_name'];
else
	$event_name = '';
