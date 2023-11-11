<?php
session_start();

require "function.php";
require "CreateDb.php";

$db = new CreateDb("Productdb", "Producttb");
$total = 0;
if (!isset($_SESSION["login"])) {
	header("Location: login.php");
	exit;
}

$buktiQr = "";

if (isset($_POST["submit"])) {
	$buktiQr = upload();
	if (uploadFile() > 0) {
		echo " 
            <script>
                alert('Success !');
            </script>
            ";
	} else {
		echo " 
            <script>
                alert('Error has Occurred');
            </script>
        ";
	}
}

// Remove ".jpg" and ".png" extensions
$idQr = str_replace(array('.jpg', '.png'), '', $buktiQr);
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Payment</title>
	<link rel="stylesheet" type="text/css" href="assets/css/Payment.css">

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
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

	<!-- Font Awesome -->



	<!-- Font Awesome -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />


	<link id="mainStyle" rel="stylesheet" href="assets/css/Payment.css">
	<link rel="icon" href="assets/img/pngwing.com (1).png">
</head>

<body>

	<!---header--->
	<header>
		<a href="" class="logo"><i class='bx bxs-home'></i>GERAI 13</a>

		<ul class="navlist">
			<li><a href="home.php" class="active">Home</a></li>
			<li><a href="menu.php">Menu</a></li> <!--Menu-->
			<li><a href="cart.php">Cart</a></li> <!--Cart-->
			<?php
			if (isset($_SESSION['cart'])) {
				$count = count($_SESSION['cart']);
				echo "<span id=\"cart_count\" class=\"text-warning\">$count</span>";
			} else {
				echo "<span id=\"cart_count\" class=\"text-warning \">0</span>";
			}
			?>
			<li><a href="Payment.php">Checkout</a></li> <!--checkout-->
		</ul>

		<div class="nav-icons">

			<a href="logout.php" id="logout"><i class='bx bx-log-out-circle'></i></a>
			<div class="bx bx-menu" id="menu-icon"></div>
		</div>
	</header>

		<!-----menu start----->
		<section class="checkout" id="checkout">
			<div class="heading">
				<h1>Checkout</h1>
			</div>
			<!-- order sum -->
			<div class="orderSum">
				<?php


				if (isset($_SESSION['cart'])) {
					$product_id = array_column($_SESSION['cart'], 'product_id');

					$result = $db->getData();
					while ($row = mysqli_fetch_assoc($result)) {
						foreach ($product_id as $id) {
							if ($row['id'] == $id) {
								cartElement($row['product_image'], $row['product_name'], $row['product_price'], $row['id']);
								$total = $total + (int)$row['product_price'];
							}
						}
					}
				} else {
					echo "<h5>Cart is Empty</h5>";
				}
				$_SESSION["total"] = $total;
				?>

				<p class="line"></p>
				<br>
				<h2 class="subtotal">Total</h2>
				<h2 class="total">RM <?php echo $_SESSION["total"] ?></h2>
			
				<i class='bx bx-receipt'></i>
				<h1 class="payment">Payment</h1>
			
				<div class="checkout" id="checkout">
					<div class="box-img">
						<img src="assets/img/QrCode.png">			

						<br>
						<form action="" method="post" enctype="multipart/form-data">
							<?php if (isset($_POST["submit"])) : ?>
								<input type="file" name="img" id="img" style="display: none;">
								<button type="submit" name="submit" style="display: none;">Hantar</button>
							<?php else : ?>
								<input type="file" name="img" id="img">
								<button type="submit" name="submit">Hantar</button>
							<?php endif; ?>
						</form>

						<ul>
							<li>
								<img src="<?php echo "assets/img/buktiQr/" . $buktiQr; ?>" alt="" style="width:100px;height:100px; 
								<?php if ($buktiQr == "") 
								{
								echo "display: none;";
								} ?>">
							</li>
							<li>ID Qr : <?php echo $idQr ?></li>
						</ul>
						<button class="s-btnn btn btn-sm btn-warning md-3" style="margin-left: 100px;"> <li><a class="text-white" style="text-decoration: none;" href="thanks.php">Submit</a></li></button>
					</div>
					<div>

					</div>
				</div>

			</div>
			<!-- order sum -->
			</section>
			
		




	<script src="js/Style.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
	<script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
</body>

</html>