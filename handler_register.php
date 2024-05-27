<?php
// $id = $_POST['id'];
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];

$koneksi = new mysqli('localhost', 'root', '', 'aas_ddg');
if ($koneksi) {
    // echo "berhasil";
} else {
    echo $koneksi->error;
}

$insert = $koneksi->query("INSERT INTO user
(username, email, password)
values
('$username', '$email', '$password')
");

if ($insert) {
    // echo "<div class='container'>Anda data termasuk</div>";
} else {
    echo "gagal insert data";
}

header("Location: login.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <h2>data anda berhasil teregister</h2>
        <!-- <label for="">Berhasil</label> -->
    </div>
</body>

</html>