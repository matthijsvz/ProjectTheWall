<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="styleindex.css">

</head>
<body>
  <header>
    <ul>
    <a href=index.php>  <img src="thewall.jpeg" style="float:left;width:150px;"> </a>
    <a href=login/index.php><img src="login.jpg"  style="border-top: solid black 5px;float:right;width:150px;border-right: solid black 15px;"></a>

    </ul>
  </header>

</body>
</html>


<?php

  // Create database connection

  $db = mysqli_connect("localhost", "24542_username", "Welkom001", "24542_db");

  // Initialize message variable
  $msg = "";

  // If upload button is clicked ...
  if (isset($_POST['upload'])) {
  	// Get image name
  	$image = $_FILES['image']['name'];
  	// Get text
  	$image_text = mysqli_real_escape_string($db, $_POST['text']);

  	// image file directory
  	$target = "images/".basename($image);

  	$sql = "INSERT INTO fotos (image, text) VALUES ('$image', '$image_text')";
  	// execute query
  	mysqli_query($db, $sql);

  	if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
  		$msg = "Image uploaded successfully";
  	}else{
  		$msg = "Failed to upload image";
  	}
  }
  $result = mysqli_query($db, "SELECT * FROM fotos");
?>
<!DOCTYPE html>
<html>
<head>
<title>Image Upload</title>
</head>
<body>
<div id="content">
    <div class="masonry">
  <?php
    while ($row = mysqli_fetch_array($result)) {
//      echo "<div id='img_div'>";
      	echo "<img src='images/".$row['image']."' >";
//      	echo "<p>".$row['image_text']."</p>";
//      echo "</div>";
    }
  ?>
  </div>

</div>
</body>
</html>
