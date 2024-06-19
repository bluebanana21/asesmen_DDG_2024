<?php
if (isset($_POST['liked'])) {
    $post_id = $_POST['post_id'];
    $result = "SELECT * FROM comments WHERE id=$post_id";
    $resultSelect = mysqli_query($koneksi, $$result);
    $row = mysqli_fetch_array($resultSelect);
    $n = $row['likes'];

    mysqli_query($koneksi, "UPDATE comments SET likes=$n+1 WHERE id=$post_id");
    mysqli_query($koneksi, "INSERT INTO likes (user_id, post_id) VALUES (1, $postid)");
    // mysqli_query($koneksi, "UPDATE posts SET likes=$n+1 WHERE id=$postid");

    echo $n + 1;
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
</head>

<body>
    <header class="p-4 bg-dark text-center">
        <h1><a href="home.php" class="text-light text-decoration-none">BlawgBlog</a></h1>

    </header>

    <div class="post-list mt-5">
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
                        <h5>by <?php echo $data['author']; ?></h5>
                        <p><?php echo $data['date'] ?></p>
                        <img src="../Assets/images/<?php echo $data["image"] ?>" width="60%" height="60%" alt="">
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

    <div class="">
        <?php
        include ("comment.php");
        ?>
    </div>

    <div class="footer bg-dark p-4 mt-4">
        <a href="../admin/manage.php" class="text-light">Admin panel</a>
    </div>

    <script type="text/javascript" src="jquery.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            $.('.like').click(function () {
                var post_id = $(this).attr('id');
                $.ajax({
                    url: 'view.php',
                    type: 'post',
                    async: 'false',
                    data: {
                        'liked': 1
                        'post_id': post_id
                    },
                    success: function () {

                    }
                });
            });
        });
    </script>

</body>

</html>