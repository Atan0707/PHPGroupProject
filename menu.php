<?php
session_start();

require "function.php";
require "CreateDb.php";


if (!isset($_SESSION["login"])) {
	header("Location: login.php");
	exit;
}

$database = new CreateDb("Productdb", "Producttb");

if (isset($_POST["submit"])) {
	if (tambah($_POST) > 0) {
		echo " 
            <script>
                alert('Success !');
                document.location.href='menu.php';
            </script>
            ";
	} else {
		echo " 
        <script>
                alert('Error has Occur');
                document.location.href='menu.php';
            </script>
        ";
	}
}

?>



<!DOCTYPE html> <!--tukar nama file ke menu.php -->
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>GERAI 13</title>
	<link rel="stylesheet" type="text/css" href="assets\css\style.css">

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
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<link id="mainStyle" rel="stylesheet" href="assets/css/style.css">
	<link rel="icon" href="assets\img\pngwing.com (1).png">
</head>

<body>

	<!---header--->
	<header>
		<a href="#" class="logo" style="text-decoration: none;"><i class='bx bxs-home'></i>GERAI 13</a>

		<ul class="navlist">
			<li><a href="home.php">Home</a></li>
			<li><a href="">Menu</a></li> <!--Menu--> <!--NI UNTUK MENU,,nanti tukar path menu-->
			<li><a href="cart.php" class="active">Cart</a></li>
			<?php
			if (isset($_SESSION['cart'])) {
				$count = count($_SESSION['cart']);
				echo "<span id=\"cart_count\" class=\"text-warning\">$count</span>";
			} else {
				echo "<span id=\"cart_count\" class=\"text-warning \">0</span>";
			}
			?>
			<!--Cart-->
			<li><a href="cart.php">Checkout</a></li> <!--checkout-->

		</ul>

		<div class="nav-icons">

			<a href="logout.php" id="logout" onclick="logout()"><i class='bx bx-log-out-circle'></i></a>
			<div class="bx bx-menu" id="menu-icon"></div>
		</div>
	</header>

	</section>

	<!---our shop--->
	<section class="shop" id="shop">
		<div class="middle-text">
			<h4>Gerai 13 Menu</h4>
			<h2>Menu Popular Kami!</h2>
		</div>

		<div class="shop-content">

			<div class="row">
				<form action="" method="post">

					<h3 class="fs-6 text-warning">American Burger</h3>
					<img src="assets\img\American-Burger.jpg" class="img-thumbnail">

					<p></p>
					<div class="in-text">
						<div class="price">
							<h6>RM 10 </h6>
						</div>
						<input type="hidden" name="product_id" value="1">
						<button class="s-btnn btn btn-sm btn-warning" type="submit" name="add">Add to cart</button>

				</form>


			</div>


		</div>

		<form action="" method="post">
			<div class="row">
				<h3 class="fs-7 text-warning">BigMac</h3>
				<img src="assets\img\BigMac.jpg" class="img-thumbnail">

				<p></p>
				<div class="in-text">
					<div class="price">
						<h6>RM 10 </h6>
					</div>
					<input type="hidden" name="product_id" value="2">
					<button class="s-btnn btn btn-sm btn-warning" type="submit" name="add">Add to cart</button>

				</div>
		</form>

		</div>

		<div class="row">
			<form action="" method="post">
				<h3 class="fs-6 text-warning">Chicken Katsu Burger</h3>
				<img src="assets\img\Chicken-Katsu-Burger.jpg" class="img-thumbnail">

				<p></p>
				<div class="in-text">
					<div class="price">
						<h6>RM 10</h6>
					</div>
					<input type="hidden" name="product_id" value="3">
					<button class="s-btnn btn btn-sm btn-warning" type="submit" name="add">Add to cart</button>


				</div>
			</form>

		</div>

		<div class="row">
			<form action="" method="post">
				<h3 class="fs-6 text-warning">Grilled Chicken Burger With Sambal Sauce</h3>
				<img src="assets\img\Grilled-Chiken-burger-with-sambal-sauce.jpg" class="img-thumbnail">

				<p></p>
				<div class="in-text">
					<div class="price">
						<h6>RM 15</h6>
					</div>
					<input type="hidden" name="product_id" value="4">
					<button class="s-btnn btn btn-sm btn-warning" type="submit" name="add">Add to cart</button>
				</div>
			</form>

		</div>


		<div class="row">
			<form action="" method="post">
				<h3 class="fs-6 text-warning">Korean Burger</h3>
				<img src="assets\img\Korean-Burger.jpg" class="img-thumbnail">

				<p></p>
				<div class="in-text">
					<div class="price">
						<h6>RM 11</h6>
					</div>
					<input type="hidden" name="product_id" value="5">
					<button class="s-btnn btn btn-sm btn-warning" type="submit" name="add">Add to cart</button>
				</div>

			</form>

		</div>

		<div class="row">
			<form action="" method="post">
				<h3 class="fs-6 text-warning">Ocean Cheese Burger</h3>
				<img src="assets\img\ocean-cheese-burger.jpg" class="img-thumbnail">

				<p></p>
				<div class="in-text">
					<div class="price">
						<h6>RM 12</h6>
					</div>
					<input type="hidden" name="product_id" value="6">
					<button class="s-btnn btn btn-sm btn-warning" type="submit" name="add">Add to cart</button>
				</div>

			</form>

		</div>

		<div class="row">
			<form action="" method="post">
				<h3 class="fs-6 text-warning">Round-Chicken Burger</h3>
				<img src="assets\img\Round-Chicken-Burger.jpg" class="img-thumbnail">

				<p></p>
				<div class="in-text">
					<div class="price">
						<h6>RM 14</h6>
					</div>
					<input type="hidden" name="product_id" value="7">
					<button class="s-btnn btn btn-sm btn-warning" type="submit" name="add">Add to cart</button>
				</div>
			</form>

		</div>


		<div class="row">
			<form action="" method="post">
				<h3 class="fs-6 text-warning">Smokey Beef Burger</h3>
				<img src="assets\img\Smokey-Beef-Burger.jpg" class="img-thumbnail">

				<p></p>
				<div class="in-text">
					<div class="price">
						<h6>RM 10</h6>
					</div>
					<input type="hidden" name="product_id" value="8">
					<button class="s-btnn btn btn-sm btn-warning" type="submit" name="add">Add to cart</button>
				</div>

			</form>

		</div>

		<div class="row">
			<form action="" method="post">


				<h3 class="fs-6 text-warning">Triple Mini Burger + Wedges</h3>
				<img src="assets\img\Triple-Mini-Burger-wedges.jpg" class="img-thumbnail">
				<p></p>
				<div class="in-text">
					<div class="price">
						<h6>RM 15</h6>
					</div>
					<input type="hidden" name="product_id" value="9">
					<button class="s-btnn btn btn-sm btn-warning" type="submit" name="add">Add to cart</button>
				</div>

		</div>
		</form>

		<div class="row">
			<form action="" method="post">
				<h3 class="fs-6 text-warning">Filet-O-Fish Burger</h3>
				<img src="assets\img\Keto-Fish-Burger.jpg" class="img-thumbnail">

				<p></p>
				<div class="in-text">
					<div class="price">
						<h6>RM 15</h6>
					</div>
					<input type="hidden" name="product_id" value="10">
					<button class="s-btnn btn btn-sm btn-warning" type="submit" name="add">Add to cart</button>
				</div>


			</form>

		</div>

		<div class="row">
			<form action="" method="post">
				<h3 class="fs-6 text-warning">Caramelized Onion Burger</h3>
				<img src="assets\img\caramelized-onion-burger.jpg" class="img-thumbnail">

				<p></p>
				<div class="in-text">
					<div class="price">
						<h6>RM 10</h6>
					</div>
					<input type="hidden" name="product_id" value="11">
					<button class="s-btnn btn btn-sm btn-warning" type="submit" name="add">Add to cart</button>

				</div>
			</form>


		</div>


		<div class="row">
			<form action="" method="post">
				<h3 class="fs-6 text-warning">Chicken Burger With Egg</h3>
				<img src="assets\img\egg-burger.jpg" class="img-thumbnail">

				<p></p>
				<div class="in-text">
					<div class="price">
						<h6>RM 15</h6>
					</div>
					<input type="hidden" name="product_id" value="12">
					<button class="s-btnn btn btn-sm btn-warning" type="submit" name="add">Add to cart</button>
				</div>
			</form>


		</div>

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