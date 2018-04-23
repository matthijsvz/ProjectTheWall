<?php

require ('../../../../private/db.php');

// Hoort de bezoeker hier wel te zijn?
if (!isset($_POST['submit_registration'])) {
    header('Location: register.php');
}

// Zijn alle velden ingevuld?
if (empty($_POST['username']) OR empty($_POST['password']) OR empty($_POST['password2'])) {
    echo 'Je bent vergeten iets in te voeren.<br>';
    echo 'Klik <a href="register.php">hier</a> om terug te keren.<br>';
    exit();
}

// Zijn beide wachtwoorden gelijk?
if ($_POST['password'] != $_POST['password2']) {
    echo 'Je hebt 2 verschillende wachtwoorden getypt.<br>';
    echo 'Klik <a href="register.php">hier</a> om terug te keren.';
    exit();
}


// Bestaat deze username al?
$query = "SELECT userid FROM users WHERE username = ?";
$stmt = $mysqli->prepare($query);
$stmt->bind_param('s', $username);
$username = $_POST['username'];
$result = $stmt->execute() or die ('Error querying username.');
$row  = $stmt->fetch();
if ($row) {
    echo 'Sorry, deze naam is al bezet.<br>';
    echo 'Klik <a href="register.php">hier</a> om terug te keren.<br>';
    exit();
}

// Bestaat dit mailadres al?
$query = "SELECT userid FROM users WHERE mailadres = ?";
$stmt = $mysqli->prepare($query);
$stmt->bind_param('s', $mailadres);
$mailadres = $_POST['mailadres'];
$result = $stmt->execute() or die ('Error querying mailadres.');
$row  = $stmt->fetch();
if ($row) {
    echo 'Het lijkt erop dat je al een account hebt..<br>';
    echo 'Klik <a href="register.php">hier</a> om terug te keren.<br>';
    exit();
}

// Gebruiker toevoegen aan de database

$query = "INSERT INTO users VALUES (0,?,?,?,?,0)";
$stmt = $mysqli->prepare($query);
$stmt->bind_param('ssss',$mailadres,$username,$hash,$password);
$username = $_POST['username'];
$mailadres = $_POST['mailadres'];
$random_number = rand(0,1000000);
$hash = hash('sha512',$random_number);
$password = hash('sha512', $_POST['password']);
$result = $stmt->execute() or die ('Error inserting user.');

// Gebruiker mailen
$to = $_POST['mailadres'];
$subject = 'Verifieer je account bij THE WALL';
$message = 'Klik op  de volgende link om je account te activeren: ';
$message .= 'http://24542.hosts.ma-cloud.nl/bewijzenmap/projthewall/register/verify.php?mailadres=' . $mailadres  . '&hash=' . $hash;
$headers = 'From: 24542@ma-web.nl';
mail($to,$subject,$message,$headers) or die ('Error mailing');


echo 'Er is een email naar uw mailbox verstuurd!';
