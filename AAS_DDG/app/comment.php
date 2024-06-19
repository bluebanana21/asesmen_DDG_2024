<?php
// include ("components/header.php");
include ("checkLogin.php");
// include ("../app/login.php");

$user = $_SESSION['user_login'];
// print_r($user)
$id = $_GET['id'];

print_r($id)
    ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>

<body>
    <form action="../admin/handler_create.php" method="post">
        <input type="hidden" name="author" value="<?php echo $user["username"]; ?>">
        <input type="hidden" name="post_id" value="<?php echo $id; ?>">
        <input type="hidden" name="date" value="<?php date_default_timezone_set("Asia/Jakarta");
        echo date("d/m/Y h:i:a"); ?>">
        <textarea name="message" id=""></textarea>

        <div class="form-field">
            <input type="submit" class="btn btn-primary" value="submit" name="comment">
        </div>
        <br>
    </form>

    <?php
    include ("functions.php");
    // getComments($koneksi);
    $user = $_SESSION['user_login'];
    $userid = $user["id_user"];
    $sql = "SELECT * FROM comments ORDER BY date DESC";
    $result = mysqli_query($koneksi, $sql);
    while ($rows = $result->fetch_assoc()) {
        $id = $_GET['id'];
        if ($rows["post_id"] == $id) {
            # code...
    
            ?>
            <div class="card">
                <div class="card-body">
                    <p class="card-title"><?php
                    echo $rows['author'];
                    ?></p>
                    <h5 class="card-text"><?php
                    echo $rows['comment'];
                    ?></h5>
                    <div class="text-muted">

                        <?php
                        echo $rows['date'];
                        ?>
                    </div>
                    <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
                </div>
                <?php
                $query = mysqli_query($koneksi, "SELECT * FROM comments WHERE post_id = $id");
                while ($row = mysqli_fetch_array($query)) { ?>
                    <div class="post">
                        <?php echo $rows['comment']; ?><br>

                        <?php
                        $result = mysqli_query($koneksi, "SELECT * FROM likes where user_id=1 AND post_id=" . $row['id'] . "");
                        if (mysqli_num_rows($result) == 1) { ?>
                            <span><a href="" class="unlike" id="<?php echo $row['id'] ?>">unlike</a></span>
                    
                        <?php } else { ?>
                            <span><a href="" class="like" id="<?php echo $row['id'] ?>">like</a></span>
                        <?php } ?>

                    </div>
                    <?php
                }
                ?>
                <span class="likes_count"><?php echo $rows['likes']; ?> likes</span>


                <!-- <div class="likes">
                    <span>

                        <a href="">Like</a>
                    </span>
                </div> -->
            </div>
            <br>
            <?php
        }
    }
    ?>


</body>

</html>