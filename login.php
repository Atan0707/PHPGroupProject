<?php
session_start();
require "function.php";


if (isset($_POST["login"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $result = mysqli_query($conn, "SELECT * FROM user WHERE Username = '$username'");
    // check username
    if (mysqli_num_rows($result) === 1) {
        // check password
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row["password"])) {
            // set session
            $_SESSION["login"] = true;
            $_SESSION["username"] = $username;
            header("Location: home.php");
            exit;
        }
    }
    $error = true;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='http://fonts.googleapis.com/css?family=Oswald:400,300,700' rel='stylesheet' type='text/css'>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Amatic+SC:wght@700&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@800&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lexend+Peta:wght@300&display=swap" rel="stylesheet">
    <title>GERAI 13 - Your Best fast Food Restaurant</title>
    <!-- Bootstrap 5 CDN-Import: -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link id="mainStyle" rel="stylesheet" href="assets/css/style.css">
    <link rel="icon" href="assets\img\pngwing.com (1).png">
</head>

<body>
    <?php if (isset($error)) { ?>
        <p style="color: red; font-style: italic;">username / password salah!</p>
    <?php } ?>
    <div class="page-content d-flex align-items-center">
        <div class="container d-flex justify-content-center">
            <div class="col-12 col-sm-10 col-md-8 col-lg-7 col-xl-6 col-xxl-5">
                <h5 class="auth-title display-1 text-center text-warning">GERAI 13</h5>
                <hr class="separator">
                <div class="auth-card">
                    <hr class="separator">
                    <h3 class="auth-title display-4 text-center text-danger"><strong>SIGN IN</strong></h3>
                    <hr class="separator">
                    <!-- Login-Form-->
                    <form action="" method="post">
                        <div class="mb-2 mt-5 display-6">
                            <input type="text" name="username" class="form-control auth-input" placeholder="USERNAME">
                            <div class="form-text input-info-text"></div>
                        </div>
                        <div class="mb-2 dis">
                            <input type="password" name="password" class="form-control auth-input" placeholder="PASSWORD">
                        </div>
                        <button type="submit" name="login" class="btn auth-btn mt-2 mb-4">SUBMIT</button>
                    </form>
                    <p class="text mb-4 text-danger">Don't Have Account? <a href="signup.php" class="text-link">Sign Up</a></p>
                </div>
            </div>
        </div>
    </div>
    <!-- Bootstrap 5 JS-Bundle CDN import: -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
</body>

</html>