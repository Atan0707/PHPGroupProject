<?php

session_start();

require_once("CreateDb.php");
require "function.php";

$total = 0;

if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}

$db = new CreateDb("Productdb", "Producttb");

if (isset($_POST['remove'])) {
    if ($_GET['action'] == 'remove') {
        foreach ($_SESSION['cart'] as $key => $value) {
            if ($value["product_id"] == $_GET['id']) {
                unset($_SESSION['cart'][$key]);
                echo "<script>alert('Product has been Removed...!')</script>";
                echo "<script>window.location = 'cart.php'</script>";
            }
        }
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
	<header id="header">
		<a href="#" class="logo" style="text-decoration: none;"><i class='bx bxs-home'></i>GERAI 13</a>

		<ul class="navlist">
			<li><a href="home.php">Home</a></li>
			<li><a href="menu.php">Menu</a></li> <!--Menu--> <!--NI UNTUK MENU,,nanti tukar path menu-->
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
			<li><a href="Payment.php">Checkout</a></li> <!--checkout-->

		</ul>

		<div class="nav-icons">

			<a href="logout.php" id="logout" onclick="logout()"><i class='bx bx-log-out-circle'></i></a>
			<div class="bx bx-menu" id="menu-icon"></div>
		</div>
	</header>
<br><br><br>
	<section class="">
		<div>
        <div class="container-fluid">
        <div class="row px-5">
            <div class="col-md-7">
                <div class="shopping-cart">
                    <h6>My Cart</h6>
                    <hr>

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


                </div>
            </div>
            <div class="col-md-4 offset-md-1 border rounded mt-5 h-25">

                <div class="pt-4">
                    <h6>PRICE DETAILS</h6>
                    <hr>
                    <div class="row price-details">
                        <div class="col-md-6">
                            <?php
                            if (isset($_SESSION['cart'])) {
                                $count  = count($_SESSION['cart']);
                                echo "<h6>Price ($count items)</h6>";
                            } else {
                                echo "<h6>Price (0 items)</h6>";
                            }
                            ?>
                            <h6>Delivery Charges</h6>
                            <hr>
                            <h6>Amount Payable</h6>
                        </div>
                        <div class="col-md-6">
                            <h6>$<?php echo $total; ?></h6>
                            <h6 class="text-success">FREE</h6>
                            <hr>
                            <h6>$<?php
                                    echo $total;
                                    ?></h6>
                        </div>
                        <div>
                            <br><br>
                            
                            <button class="s-btnn btn btn-sm btn-warning md-3"> <li><a class="text-white" style="text-decoration: none;" href="Payment.php"> Checkout</a></li></button></center>
                            
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
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