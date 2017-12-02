<?php
// check if fields passed are empty
if (empty($_POST['name'])        ||
   empty($_POST['email'])       ||
   empty($_POST['subject'])         ||
   empty($_POST['message'])     ||
   !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    echo "No arguments Provided!";
    return false;
}
    
$name = $_POST['name'];
$email_address = $_POST['email'];
$email_subject = $_POST['subject'];
$message = $_POST['message'];
    
// create email body and send it	
$to = 'interfacesplit@gmail.com'; // put your email
$email_subject = "$email_subject:  $name";
$email_body = "You have received a new message. \n\n".
                  " Here are the details:\n \nName: $name \n ".
                  "Email: $email_address\n Subject: $email_subject Message \n $message";
$headers = "From: $email_address\r\n";
$headers .= "Reply-To: $email_address\r\n";
mail($to, $email_subject, $email_body, $headers);
return true;
