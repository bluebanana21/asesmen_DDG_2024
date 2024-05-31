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
            include ("koneksi.php");
            $sqlSelect = "SELECT * FROM posts";
            $result = mysqli_query($koneksi, $sqlSelect);
            while ($data = mysqli_fetch_array($result)) {
                ?>

                <div class="row mb-4 p-5 bg-light">
                    <div class="col sm-2">
                        <?php
                        echo $data['date']
                            ?>
                    </div>
                    <div class="col sm-3">
                        <h2>
                            <?php
                            echo $data['title']
                                ?>
                        </h2>
                    </div>
                    <div class="col sm-5">
                        <?php
                        echo $data['content']
                            ?>
                    </div>
                    <div class="col sm-2">
                        <a href="view.php?id=<?php echo $data['id']; ?>" class="btn btn-primary">READ MORE</a>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>
    </div>
</body>

</html>