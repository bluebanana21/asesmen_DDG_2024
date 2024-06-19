<?php
include ("components/header.php");
?>

<div class="post w-100 bg-light p-5">
    <?php
    $id = $_GET["id"];

    if ($id) {
        include ("../app/koneksi.php");
        $sqlSelectPost = "SELECT * FROM posts WHERE id = $id";
        $result = mysqli_query($koneksi, $sqlSelectPost);
        while ($data = mysqli_fetch_array($result)) {
            ?>
            <h1><?php echo $data['title']; ?></h1>
            <h5>by <?php echo $data['author']; ?></h5>
            <p><?php echo $data['date']; ?></p>
            <img src="../Assets/images/<?php echo $data["image"] ?>" width="60%" height="60%" alt="">
            <br>
            <p><?php echo $data['content']; ?></p>
            <?php
        }
    } else {
        echo "post not found";
    }
    ?>
</div>

<?php
include ("components/footer.php");
?>