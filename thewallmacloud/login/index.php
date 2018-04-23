<?php
session_start();


if(isset($_COOKIE['userid']) OR isset($_SESSION['userid'])) {
    header('Location: welkom2.php');
}



?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="styleindex1.css">
    <title>Log in op The Wall</title>
</head>
<body>


  <ul>
  <a href=../index.php>  <img src="thewall.jpeg" style="float:left;width:150px;"> </a>

  </ul>

<h1>Inloggen</h1>
<p>Log hier in...</p>

<form method="post" action="inlogpoort.php">
    <label>Username:<input type="text" name="username"/></label><br>
    <label>password:<input type="password" name="password" /></label>
    <input type="submit" name="submit_login" value="log in" />
</form>

<p>Nog geen account? Klik dan <a href="../register/register.php">hier</a> om een account aan te maken.</p>

</body>
</html>
