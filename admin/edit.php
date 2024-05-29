<?php
include ("components/header.php");

?>

<?php
$id = $_GET['id'];

if ($id) {
    include ("../app/koneksi.php");
    $sqlEdit = "SELECT * FROM posts WHERE id = $id";
    $result = mysqli_query($koneksi, $sqlEdit);
} else {
    echo "Post not found";
}
?>

<div class="create-form w-100 mx-auto p-4" style="max-width:700px;">
    <form action="handler_create.php" method="post" enctype="multipart/form-data">
        <?php
        while ($data = mysqli_fetch_array($result)) {
            # code...
        
            ?>

            <div class="form-field mb-4">
                <input type="text" class="form-control" name="title" id="" placeholder="Enter Title:"
                    value="<?php echo $data['title'] ?>">
            </div>
            <div class="form-field mb-4">
                <textarea class="form-control" name="summary" id="" cols="30" rows="10"
                    placeholder="Enter Summary:"><?php echo $data['summary'] ?></textarea>
            </div>

            <div class="form-field mb-4">
                <textarea class="form-control" name="content" id="" cols="30" rows="10"
                    placeholder="Enter Content:"><?php echo $data['content'] ?></textarea>
            </div>

            <div class="form-field">
                <input type="file" class="btn btn-primary" name="image" accept=".jpg, .png, .jpeg"
                    value=""><?php echo $data['image'] ?>
            </div>
            <br>

            <input type="hidden" name="date" value="<?php date_default_timezone_set("Asia/Jakarta");
            echo date("d/m/Y h:i:a"); ?>">
            <input type="hidden" name="id" value="<?php echo $id ?>">

            <div class="form-field">
                <input type="submit" class="btn btn-primary" value="submit" name="update">
            </div>

            <?php
        }
        ?>
    </form>
</div>

<?php
include ("components/footer.php");
?>