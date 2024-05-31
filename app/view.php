<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <header class="bg-dark">
        <h1><a href="home.php" class="text-light text-decoration-none">Simple Blog</a></h1>
    </header>
    <div class="post-list">
        <div class="container">
            <?php
            $id = $_GET['id'];
            if ($id) {
                include ("koneksi.php");
                $sqlSelect = "SELECT * FROM posts WHERE id=$id";
                $result = mysqli_query($koneksi, $sqlSelect);
                while ($data = mysqli_fetch_array($result)) {
                    ?>

                    <div class="post bg-light p-4 mt-5">
                        <h1><?php echo $data['title'] ?></h1>
                        <p><?php echo $data['date'] ?></p>
                        <h1><?php echo $data['content'] ?></h1>
                    </div>
                    <?php
                }
            } else {
                echo "post not found";
            }

            ?>
        </div>
    </div>
</body>

</html>