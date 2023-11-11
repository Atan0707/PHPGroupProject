<?php
// connect to database
$conn = mysqli_connect("localhost", "root", "", "gerai_13"); // kalau x masukkan dkt variable pon boleh


function query($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function tambah($add)
{
    global $conn;
    $item1 = ($add["American"]);
    $item2 = ($add["Big Mac"]);
    $item3 = ($add["Chicken Katsu"]);
    $item4 = ($add["Grilled Chicken sambal sauce"]);
    $item5 = ($add["Korean"]);
    $item6 = ($add["Ocean Cheese"]);
    $item7 = ($add["Round Chicken"]);
    $item8 = ($add["Smokey Beef"]);
    $item9 = ($add["Triple Mini"]);
    $item10 = ($add["Fillet Fish"]);
    $item11 = ($add["Onion"]);
    $item12 = ($add["Chicken Burger Egg"]);

    //insert to database
    mysqli_query($conn, "INSERT INTO order_item VALUES('','$item1','$item2','$item3',
    '$item4','$item5','$item6','$item7','$item8','$item9','$item10','$item11','$item12')");
    return mysqli_affected_rows($conn);
}

function upload()
{
    $namaFile = $_FILES['img']['name'];
    $ukuranFile = $_FILES['img']['size'];
    $error = $_FILES['img']['error'];
    $tmpName = $_FILES['img']['tmp_name'];

    // cek apakah gambar sudah di upload
    if ($error === 4) {
        echo "<script>
                alert('pilih gambar terlebih dahulu!');
                </script>";
        return false;
    }
    // cek apakah gambar yg di upload
    $formatGambarValid = ['jpg', 'jpeg', 'png'];
    $formatGambar = explode('.', $namaFile);
    $formatGambar = strtolower(end($formatGambar));
    // check ada tak str nama file tu kat array formatGambarValid
    if (!in_array($formatGambar, $formatGambarValid)) {
        echo "<script>
                    alert('yang anda upload bkn gambar');
                </script>";
        return false;
    }
    // cek ukuran
    if ($ukuranFile > 1000000) {
        echo "<script>
                alert('ukuran gambar terlalu besar');
                </script>";
        return false;
    }
    // lps pengecekan, gambar blh diupload
    // generate nama gambar baharu
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.'; // $namaFileBaru = $namaFileBaru.'.';
    $namaFileBaru .= $formatGambar;
    move_uploaded_file($tmpName, 'assets/img/buktiQr/' . $namaFileBaru);
    return $namaFileBaru;
}


function padam($id)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM mahasiswa WHERE ID = $id");
    return mysqli_affected_rows($conn);
}

function ubah($data)
{
    global $conn;
    $id = $data["id"]; // xyah special sbb user xle tuka id
    $nrp = htmlspecialchars($data["NRP"]);
    $name = htmlspecialchars($data["nama"]);
    $email = htmlspecialchars($data["email"]);
    $course = htmlspecialchars($data["course"]);
    $gambarLama = htmlspecialchars($data["gambarLama"]);

    // cek user tuka gambar ke tak
    if ($_FILES['img']['error'] === 4) {
        $img = $gambarLama;
    } else {
        $img = upload();
    }

    //insert to database
    $query = "UPDATE mahasiswa SET
                    nrp = '$nrp',
                    nama = '$name',
                    email = '$email',
                    jurusan = '$course',
                    gambar = '$img'
                    WHERE ID = $id";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function find($keyword)
{
    global $conn;
    $query = "SELECT * FROM mahasiswa
            WHERE
            nama LIKE '%$keyword%' OR
            nrp LIKE '%$keyword%' OR
            email LIKE '%$keyword%' OR
            jurusan LIKE '%$keyword%'";
    return query($query);
}

function registration($data)
{
    global $conn;
    $username = (stripslashes($data["username"]));
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $passwordC = mysqli_real_escape_string($conn, $data["passwordC"]);
    $phone = mysqli_real_escape_string($conn, $data["phone"]);
    // check password confirmation
    if ($password !== $passwordC) {
        echo "<script>
                alert('confirmation password x sama!');
                </script>";
        return false;
    }
    // check username dah di cop blm
    $result = mysqli_query($conn, "SELECT username FROM user WHERE username='$username'");
    if (mysqli_fetch_assoc($result)) {
        echo "<script>
                alert('username yang dipilih sudah terdaftar!');
                </script>";
        return false;
    }
    // password encryption
    $password = password_hash($password, PASSWORD_DEFAULT);
    // tambahkan user baru ke database
    mysqli_query($conn, "INSERT INTO user VALUES('', '$username', '$password', '$phone')");
    //return
    return mysqli_affected_rows($conn);
}

if (isset($_POST['add'])) {
    /// print_r($_POST['product_id']);
    if (isset($_SESSION['cart'])) {

        $item_array_id = array_column($_SESSION['cart'], "product_id");

        if (in_array($_POST['product_id'], $item_array_id)) {
            echo "<script>alert('Product is already added in the cart..!')</script>";
            echo "<script>window.location = 'home.php'</script>";
        } else {

            $count = count($_SESSION['cart']);
            $item_array = array(
                'product_id' => $_POST['product_id']
            );

            $_SESSION['cart'][$count] = $item_array;
        }
    } else {

        $item_array = array(
            'product_id' => $_POST['product_id']
        );

        // Create new session variable
        $_SESSION['cart'][0] = $item_array;

    }
}

function cartElement($productimg, $productname, $productprice, $productid)
{
    $element = "
    
    <form action=\"cart.php?action=remove&id=$productid\" method=\"post\" class=\"cart-items\">
                    <div class=\"border rounded\">
                        <div class=\"row mx-0\">
                            <div class=\"col-md-3 pl-0 px-0\">
                                <img src=$productimg alt=\"Image1\" class=\"img-fluid\">
                            </div>
                            <div class=\"col-md-6\">
                                <h5 class=\"pt-2\">$productname</h5>
                                <small class=\"text-secondary\">Seller: gerai 13</small>
                                <h5 class=\"pt-2\">$$productprice</h5>
                                <button type=\"submit\" class=\"btn btn-warning mx-10\" name=\"remove\">Remove</button>
                            </div>
                        </div>
                    </div>
                </form>
    
    ";
    echo  $element;
}

function uploadFile()
{
    global $conn;
    // upload 
    $img = upload();
    if (!$img) {
        return false;
    }
    //insert to database
    mysqli_query($conn, "INSERT INTO bukti VALUES('','$img')");
    return mysqli_affected_rows($conn);
}
