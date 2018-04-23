<?php
session_start();

// CHECKEN OF DE GEBRUIKER VERDWAALD IS
if (!isset($_SESSION['userid'])) {
    if (!isset($_COOKIE['userid'])) {
        header('Location: uitlogpoort.php');
    } else {
        require ('cookiecheck.php');
        $_SESSION['userid'] = $_COOKIE['userid'];
        $_SESSION['hash'] = $_COOKIE['hash'];
    }
}


?>



<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="style.css">
</head>
<body>

  <h1>Mijn Account.</h1>
  <?php
  echo 'Welkom!';
  ?>
  <p>Klik <a href="../index.php">hier</a> om de wall te bekijken.</p>
  <p>Klik <a href="../index2.php">hier</a> om een foto te uploaden.</p>


<ul>
<a href=../index.php>  <img src="thewall.jpeg" style="float:left;width:150px;"> </a>
<a href=uitlogpoort.php> <img src="logout.jpg"  style="border-top: solid black 5px;float:right;width:150px;"></a>

</ul>

</body>
</html>
