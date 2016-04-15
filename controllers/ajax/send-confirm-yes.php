<?php  

use App\Events\getEvents;
$update = new getEvents();

$user_id = $_GET['user_id'];
$event_id = $_GET['event_id'];

$status = $update->getAttendInfo($user_id,$event_id);

if ($status->is_accepted != 1) {
	$is_accepted_status = $update->setIsAccepted($user_id,$event_id,1);
	$update_events = $update->updateEventPlaces($event_id, 1);


	// $mail = new PHPMailer;

	// //$mail->SMTPDebug = 3;                               // Enable verbose debug output

	// $mail->isSMTP();                                      // Set mailer to use SMTP
	// $mail->Host = 'smtp1.example.com;smtp2.example.com';  // Specify main and backup SMTP servers
	// $mail->SMTPAuth = true;                               // Enable SMTP authentication
	// $mail->Username = 'user@example.com';                 // SMTP username
	// $mail->Password = 'secret';                           // SMTP password
	// $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
	// $mail->Port = 587;                                    // TCP port to connect to

	// $mail->setFrom('from@example.com', 'Mailer');
	// $mail->addAddress('ellen@example.com');               // Name is optional

	// $mail->isHTML(true);                                  // Set email format to HTML

	// $mail->Subject = 'Here is the subject';
	// $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
	// $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

	// if(!$mail->send()) {
	//     echo 'Message could not be sent.';
	//     echo 'Mailer Error: ' . $mail->ErrorInfo;
	// } else {
	//     echo 'Message has been sent';
	// }

}

