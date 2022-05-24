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
	$target = "images/" . basename($image);

	$sql = "INSERT INTO upload_img (image, text) VALUES ('$image', '$text')";
	// execute query
	mysqli_query($db, $sql);

	if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
		$msg = "Image uploaded successfully";
	} else {
		$msg = "Failed to upload image";
	}
}
$result = mysqli_query($db, "SELECT * FROM upload_img");
?>

<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatable" content="ie=edge">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;400&display=swap" rel="stylesheet">
	<link href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css" rel="stylesheet">

	<link rel="stylesheet" href="CSS/style.css">
	<title>Shopping Cart</title>
</head>

<body>


	<a class="skip" href="#football">Skip to main content</a>

	<header>
		<div class="overlay"></div>
		<nav>
			<h2> FOOTBALL SHOP</h2>
			<ul>
				<li><a href="finders.html">Finder page</a></li>
				<li><a href="about_us.php">About</a></li>
				<li class="cart">
					<a href="Cart.html">
						<ion-icon name="basket"></ion-icon>Cart:<span>0</span>
					</a>
				</li>
				<li><a href="login.php">Login</a></li>
				<li><a href="create_user.php">Add Member</a></li>
			</ul>
		</nav>
	</header>

	<main class="container">
		<section class="image">
			<figure>
				<img src="img/adidas.jpg" alt="Qatar 2024">
				<figcaption><strong>Qatar 2024</strong></figcaption>
			</figure>
			<h3>£120.00</h3>
			<a class="add-cart" href="#">Add Cart</a>

		</section>

		<section class="image">
			<figure>
				<img src="img/adidas2.jpg" alt="Champions League">
				<figcaption><strong>Champions League</strong></figcaption>
			</figure>
			<h3>£15.00</h3>
			<a class="add-cart" href="#">Add Cart</a>

		</section>

		<section class="image">
			<figure>
				<img src="img/nike.jpg" id="football" alt="Nike">
				<figcaption><strong>Nike</strong></figcaption>
			</figure>
			<h3>£35.00</h3>
			<a class="add-cart" href="#">Add Cart</a>

		</section>

		<section class="image">
			<figure>
				<img src="img/nike2.jfif" alt="Premier League">
				<figcaption><strong>Premier League</strong></figcaption>
			</figure>
			<h3>£18.00</h3>
			<a class="add-cart" href="#">Add Cart</a>

		</section>

		<section class="image">
			<figure>
				<img src="img/goalball.jfif" alt="goalball">
				<figcaption><strong>Goalball</strong></figcaption>
			</figure>
			<h3>£22.00</h3>
			<a class="add-cart" href="#">Add Cart</a>

		</section>



		<section class="image">
			<figure>
				<img src="img/nerf.jfif" alt="nerf">
				<figcaption><strong>Nerf</strong></figcaption>
			</figure>
			<h3>£5.00</h3>
			<a class="add-cart" href="#">Add Cart</a>

		</section>

		<section class="image">
			<figure>
				<img src="img/adidas_man.jfif" alt="Adidas Manchester Utd">
				<figcaption><strong>Manchester Utd</strong></figcaption>
			</figure>
			<h3>£5.00</h3>
			<a class="add-cart" href="#">Add Cart</a>

		</section>

		<section class="image">
			<figure>
				<img src="img/world_wc_18.jfif" alt="World Cup 2018">
				<figcaption><strong>World Cup 2018</strong></figcaption>
			</figure>
			<h3>£5.00</h3>
			<a class="add-cart" href="#">Add Cart</a>

		</section>


		<?php
		while ($row = mysqli_fetch_array($result)) {

			echo "<div id='img_div'>";
			echo "<img  height='225' width='225' src='images/" . $row['image'] . "' >";
			echo "<p>" . $row['text'] . "</p>" ;
			
			echo "</div>";
			
		}
		?>
	</main>




	<script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>
	<script src="JavaScript/main.js"></script>

</body>

</html>