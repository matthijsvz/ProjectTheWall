<?php

require ('../../../../private/db.php');


// Checken of de mail klopt met de hash
$query = "SELECT userid FROM users WHERE mailadres = ? AND  hash = ?";
$stmt = $mysqli->prepare($query) or die ('Error preparing.');
$stmt->bind_param('ss', $mailadres, $hash) or die ('Error binding params.');
$mailadres = $_GET['mailadres'];
$hash = $_GET['hash'];
$stmt->execute() or die ('Error executing.');
$stmt->bind_result($userid) or die ('Error binding result.');
$row = $stmt->fetch();


if (!$userid) {
    echo 'Sorry, maar deze combinatie van email en hash ken ik niet.';
    exit();
}
$stmt->close();


// Account activeren
$query = "UPDATE users SET active = 1 WHERE userid = ?";
$stmt  = $mysqli->prepare($query) or die ('Error preparing for UPDATE.');
$stmt->bind_param('i', $userid);
$stmt->execute() or die ('Error updating.');
echo 'Je account is geactiveerd!<br>';
echo 'Klik <a href="../login/index.php">hier</a> om in te loggen.<br>';
