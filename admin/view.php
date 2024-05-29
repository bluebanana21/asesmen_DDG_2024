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
            <p><?php echo $data['date']; ?></p>
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