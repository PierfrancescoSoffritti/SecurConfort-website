<?php
// Check for empty fields
if(empty($_POST['name'])  		||
   empty($_POST['email']) 		||
   empty($_POST['phone']) 		||
   empty($_POST['message'])	||
   !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
   {
	echo "No arguments Provided!";
	return false;
   }
	
$name = $_POST['name'];
$email_address = $_POST['email'];
$phone = $_POST['phone'];
$message = $_POST['message'];
	
// Create the email and send the message
$to = 'info@securconfort.it'; // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
$email_subject = "Email dal sito web inviata da:  $name";
$email_body = "Hai ricevuto un messaggio tramite il tuo sito web.\n\n"."Dettagli:\n\nNome: $name\n\nEmail: $email_address\n\nTelefono: $phone\n\nMessaggio:\n$message";
$headers = "From: noreply@securconfort.it\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
$headers .= "Reply-To: $email_address";	

@mail($to,$email_subject,$email_body,$headers);
return true;			
?>