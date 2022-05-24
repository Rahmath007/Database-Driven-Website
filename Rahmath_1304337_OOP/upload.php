<?php
  // Create database connection
  $db = mysqli_connect("sql209.epizy.com", "epiz_31615805", "O6rmv3SG1mF", "epiz_31615805_footballshop");

  // Initialize message variable
  $msg = "";

  // If upload button is clicked ...
  if (isset($_POST['upload'])) {
  	// Get image name
  	$image = $_FILES['image']['name'];
  	// Get text
  	$text = mysqli_real_escape_string($db, $_POST['text']);

  	// image file directory
  	$target = "images/".basename($image);

  	$sql = "INSERT INTO upload_img (image, text) VALUES ('$image', '$text')";
  	// execute query
  	mysqli_query($db, $sql);

  	if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
  		$msg = "Image uploaded successfully";
  	}else{
  		$msg = "Failed to upload image";
  	}
  }
  $result = mysqli_query($db, "SELECT * FROM upload_img");
?>



<!DOCTYPE html>
<html>

<head>
  <link rel="stylesheet" href="CSS/upload.css">
  <a href="index.php"><button type="button">Homepage</button></a>
</head>

<body>
  
<?php
    while ($row = mysqli_fetch_array($result)) {
      echo "<div id='img_div'>";
      	echo "<img src='images/".$row['image']."' >";
      	echo "<p>".$row['text']."</p>";
      echo "</div>";
    }
  ?>

  </div>
  <form action="upload.php" method="post" enctype="multipart/form-data">
    <h3> Select image to uploade:</h3>
    <input type="file" name="image" id="image" width="25px">
    <textarea name="text" cols="40" rows="4" placeholder="Write something about the product "></textarea>
    <input type="submit" value="Upload Image" name="upload">
  </form>

</body>

</html>




