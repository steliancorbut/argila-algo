<?php
// check for form submission - if it doesn't exist then send back to contact form
if (!isset($_POST['save']) || $_POST['save'] != 'contact') {
    header('Location: comanda-argila-algo.php'); exit;
}
	
// get the posted data
$name = $_POST['Nume'];
$email_address = $_POST['Emil'];
$tel = $_POST['Tel'];
$str = $_POST['Str'];
$nr = $_POST['Nr'];
$bloc = $_POST['Bloc'];
$scara = $_POST['Scara'];
$etaj = $_POST['Etaj'];
$apart = $_POST['Apt'];
$loc = $_POST['Loc'];
$cod = $_POST['Cod'];
$jud = $_POST['Jud'];
$sect = $_POST['Sect'];
$cant = $_POST['cantitate'];
	
// check that a name was entered
if (empty($name))
    $error = 'Completati numele dvs.';
// check that an email address was entered
elseif (empty($email_address)) 
    $error = 'Completati adresa dvs. de email';
// check for a valid email address
elseif (!preg_match('/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/', $email_address))
    $error = 'Introduceti adresa corecta de email!';
// check that a message was entered
elseif (empty($tel))
    $error = 'Introduceti numarul de telefon.';
		
// check if an error was found - if there was, send the user back to the form
if (isset($error)) {
    header('Location: comanda-argila-algo.php?e='.urlencode($error)); exit;
}
		
// write the email content
$email_content = "Cantitate = $cant kg\n";
$email_content .= "--------------\n";
$email_content .= "Nume: $name\n";
$email_content .= "ADRESA:\n";
$email_content .= "Strada: $str, nr: $nr\n";
$email_content .= "Bloc: $bloc, Scara: $scara, Etaj: $etaj, Ap: $apart\n";
$email_content .= "Localitate: $loc, Cod postal: $cod\n";
$email_content .= "Sectorul: $sect\n";
$email_content .= "Judet: $jud\n";
$email_content .= "Tel: $tel\n";
$email_content .= "Email: $email_address\n";
$email_content .= "______________\n";
$email_content .= "Comanda trimisa de la IP: {$_SERVER['REMOTE_ADDR']}\n";
	
// send the email
mail ('office@argila-algo.ro', 'Comanda argila', $email_content,"From: " . " $name <$email_address>");
mail ($email_address, 'Comanda argila', $email_content,"From: " . " $name <$email_address>");

// send the user back to the form
header('Location: comanda-argila-algo.php?s='.urlencode('<h3>Va multumim!</h3><h4>Comanda a fost trimisa si pe adresa dvs. de email.</h4>')); exit;

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
