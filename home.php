<?php
session_start();

require "function.php";
require "CreateDb.php";

if (!isset($_SESSION["login"])) {
	header("Location: login.php");
	exit;
}

$database = new CreateDb("Productdb", "Producttb");
?>


<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>GERAI 13</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">

	<!---box icons--->
	<link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">

	<!---google fonts--->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Amatic+SC:wght@700&display=swap" rel="stylesheet">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@800&display=swap" rel="stylesheet">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Lexend+Peta:wght@300&display=swap" rel="stylesheet">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

	<!-- Font Awesome -->



	<!-- Font Awesome -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />


	<link id="mainStyle" rel="stylesheet" href="assets/css/style.css">

	<link rel="icon" href="assets\img\pngwing.com (1).png">
</head>

<body>

	<!---header--->
	<header>
		<a href="#" class="logo" style="text-decoration: none;"><i class='bx bxs-home'></i>GERAI 13</a>

		<ul class="navlist">
			<li><a href="" class="active">Home</a></li>
			<li><a href="menu.php">Menu</a></li> <!--Menu--> <!--NI UNTUK MENU,,nanti tukar path menu-->
			<li><a href="cart.php">Cart</a></li>
			<?php
			if (isset($_SESSION['cart'])) {

				$count = count($_SESSION['cart']);

				echo "<span id=\"cart_count\" class=\"text-warning\">$count</span>";
			} else {

				echo "<span id=\"cart_count\" class=\"text-warning \">0</span>";
			}
			?> <!--Cart-->
			<li><a href="cart.php">Checkout</a></li> <!--checkout-->

		</ul>

		<div class="nav-icons">

			<a href="logout.php" id="logout"><i class='bx bx-log-out-circle'></i></a>
			<div class="bx bx-menu" id="menu-icon"></div>
		</div>
	</header>
	<!---home--->

	<section class="home" id="home">
		<div class="home-text">
			<h1>Assalamualaikum, <?php echo $_SESSION["username"] ?>!</h1>
			<h2>Sedap <span> Halal</span> <br>Dapatkan burger anda, dihidangkan penuh dengan cinta seperti kisah kita di waktu dahulu :D <br></h2>

			<a href="menu.php" class="btn" style="text-decoration: none;">Order Now</a> <!-- Ke Menu -->
		</div>

		<div class="home-img">
			<img src="assets\img\burger.jpg" class="img-thumbnail">
		</div>
	</section>






	</section>

	<!---review--->

	</section>

	<!--scroll top-->
	<a href="#" class="scroll">
		<i class='bx bx-up-arrow-alt'></i>
	</a>

	<script src="https://unpkg.com/scrollreveal"></script>
	<!---link to js--->
	<script src="js/script.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
	<script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
</body>

</html>