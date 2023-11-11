<?php

session_start();

$conn = new mysqli('localhost', 'root', '');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error); //Connection failed
}
echo "DB Connected successfully<br>";

// Select the database
mysqli_select_db($conn, "gerai_13");
echo "Gerai 13 database is selected successfully <br>";

if (isset($_POST["oder_item"])) {
    if (isset($_SESSION['cart'])) {
        $session_array = array(
            'id' => $_GET['id'],
            "item1" => $_POST['item1'],
            "item2" => $_POST['item2'],
            "item3" => $_POST['item3'],
            "item4" => $_POST['item4'],
            "item5" => $_POST['item5'],
            "item6" => $_POST['item6'],
            "item7" => $_POST['item7'],
            "item8" => $_POST['item8'],
            "item9" => $_POST['item9'],
            "item10" => $_POST['item10'],
            "item11" => $_POST['item11'],
            "item12" => $_POST['item12']
        );

        $_SESSION['cart'][] = $session_array($_SESSION['cart'], "id");

        if (!in_array($_GET['id'], $session_array_id)) {

            $session_array = array(
                'id' => $_GET['id'],
                "item1" => $_POST['item1'],
                "item2" => $_POST['item2'],
                "item3" => $_POST['item3'],
                "item4" => $_POST['item4'],
                "item5" => $_POST['item5'],
                "item6" => $_POST['item6'],
                "item7" => $_POST['item7'],
                "item8" => $_POST['item8'],
                "item9" => $_POST['item9'],
                "item10" => $_POST['item10'],
                "item11" => $_POST['item11'],
                "item12" => $_POST['item12']
            );
        }
    } else {

        $session_array = array(
            'id' => $_GET['id'],
            "item1" => $_POST['item1'],
            "item2" => $_POST['item2'],
            "item3" => $_POST['item3'],
            "item4" => $_POST['item4'],
            "item5" => $_POST['item5'],
            "item6" => $_POST['item6'],
            "item7" => $_POST['item7'],
            "item8" => $_POST['item8'],
            "item9" => $_POST['item9'],
            "item10" => $_POST['item10'],
            "item11" => $_POST['item11'],
            "item12" => $_POST['item12']
        );

        $_SESSION['cart'][] = $session_array;
    }
}



?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">


</head>

<body>

    <div class="col-md-6">
        <h2 class="text-center">Item Selected</h2>

        <?php

        ?>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>

</html>