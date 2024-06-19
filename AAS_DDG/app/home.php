<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        .fixed-size {
            height: 320px;
            width: 100%;
            object-fit: cover;
        }
    </style>
</head>
<?php
require 'functions.php';
$postingan = query("SELECT * FROM posts");

// tombol cari ditekan
if (isset($_POST["cari"])) {
    $postingan = cari($_POST["keyword"]);
}
?>

<body>
    <header class="p-4 bg-dark text-left">
        <div class="d-flex">
            <h1><a href="home.php" class="text-light text-decoration-none">BlawgBlog</a></h1>
            <!-- <br> -->
            <div class="ms-auto">
                <form action="" method="post">
                    <input type="text" name="keyword" size="40" autofocus placeholder="masukkan keyword pencarian.."
                        autocomplete="off" id="keyword">
                    <button type="submit" name="cari" id="tombol-cari">Cari!</button>
                </form>
            </div>

            <h2 class="ms-auto text-end">
                <a href="../admin/manage.php" class="text-light m">profile</a>
            </h2>
            <?php
            ?>
        </div>
    </header>
    <!-- <a href="login.php"></a> -->
    <div class="post-list mt-5">
        <div class="container">
            <?php
            include ("koneksi.php");
            $sqlSelect = "SELECT * FROM posts";
            $result = mysqli_query($koneksi, $sqlSelect);
            ?>
            <div class="row">
                <?php
                while ($data = mysqli_fetch_array($result)) {
                    ?>

                    <div class="card" style="width: 18rem;">
                        <img src="../Assets/images/<?php echo $data['image']?>" class="card-img-top fixed-size" alt="...">
                        <div class="card-body">
                            <h5><?php echo $data['title']?></h5>
                            <p class="card-text"><?php echo $data['summary']?></p>
                                <a class="btn btn-primary" href="view.php?id=<?php echo $data["id"] ?>">Read more</a>
                        </div>
                    </div>
                    <br>
                    <?php
                }
                ?>
            </div>
        </div>
    </div>
    <div class="footer bg-dark p-4 mt-4">
        <!-- <a href="../admin/manage.php" class="text-light">profile</a> -->
        <a href="logout.php" class="text-light">Logout</a>
    </div>
</body>

</html>