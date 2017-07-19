<?php
// check for form submission - if it doesn't exist then send back to contact form
if (!isset($_POST['save']) || $_POST['save'] != 'contact') {
    header('Location: contact-argila-algo.php'); exit;
}
	
// get the posted data
$name = $_POST['nume'];
$email_address = $_POST['email'];
$subiect = $_POST['subiect'];
$mesaj = $_POST['mesaj'];
	
// check that a name was entered
if (empty($name))
    $error = 'Completati numele dvs.';
// check that an email address was entered
elseif (empty($email_address)) 
    $error = 'Completati email-ul dvs.';
// check for a valid email address
elseif (!preg_match('/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/', $email_address))
    $error = 'Introduceti adresa corecta de email.';
// check that a message was entered
elseif (empty($mesaj))
    $error = 'Completati mesajul dvs.';
		
// check if an error was found - if there was, send the user back to the form
if (isset($error)) {
    header('Location: contact-argila-algo.php?e='.urlencode($error)); exit;
}
		
// write the email content
$email_content = "Nume: $name\n";
$email_content .= "Email: $email_address\n";
$email_content .= "Subiect: $subiect\n";
$email_content .= "Mesaj: $mesaj\n";
$email_content .= "______________\n";
$email_content .= "Mesaj trimis de la IP: {$_SERVER['REMOTE_ADDR']}\n";

// send the email
mail ('office@argila-algo.ro', $subiect, $email_content,"From: " . " $name <$email_address>");
mail ($email_address, $subiect, $email_content,"From: " . " $name <$email_address>");

// send the user back to the form
header('Location: contact-argila-algo.php?s='.urlencode('Mesajul a fost trimis. Va multumim!')); exit;

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title></title>
    </head>
    <body>
        
    </body>
</html>
