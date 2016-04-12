<?php  

$event_id = $par;
$user_id = $_SESSION['user_id'];

$query = 'INSERT INTO attend (event_id,user_id)
		  VALUES (:event_id,:user_id)';
$prepare = $pdo->prepare($query);
$prepare->bindValue('event_id',$event_id);
$prepare->bindValue('user_id',$user_id);
$prepare->execute();
