<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="register1.css">
    <title>THE WALL - REGISTER</title>
</head>
<body>

  <ul>
  <a href=../index.php>  <img src="../thewall.jpeg" style="float:left;width:150px;"> </a>
  <a href=uitlogpoort.php> <img src="logout.jpg"  style="border-top: solid black 5px;float:right;width:150px;"></a>

  </ul>

    <h1>Registreren</h1>
    <form method="post" action="process_registration.php">
        <label>Gebruikersnaam:<br><input type="text" name="username" /></label><br>
        <label>Mailadres:<br><input type="text" name="mailadres" /></label><br>
        <label>Password:<br><input type="password" name="password" /></label><br>
        <label>Herhaal Password:<br><input type="password" name="password2" /></label><br><br>
        <label><input type="submit" name="submit_registration" value="Registreer" /></label><br>
    </form>

</body>
</html>
