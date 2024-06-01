<?php
include ("components/header.php");
include ("../app/check_login.php");

?>

<div class="create-form w-100 mx-auto p-4" style="max-width:700px;">
    <form action="handler_create.php" method="post" enctype="multipart/form-data">
        <div class="form-field mb-4">
            <input type="text" class="form-control" name="title" id="" placeholder="Enter Title:">
        </div>
        <div class="form-field mb-4">
            <textarea class="form-control" name="summary" id="" cols="30" rows="10"
                placeholder="Enter Summary:"></textarea>
        </div>

        <div class="form-field mb-4">
            <textarea class="form-control" name="content" id="" cols="30" rows="10"
                placeholder="Enter Content:"></textarea>
        </div>

        <div class="form-field">
            <input type="file" class="btn btn-primary" name="image" accept=".jpg, .png, .jpeg" value="">
        </div>
        <br>

        <input type="hidden" name="date" value="<?php date_default_timezone_set("Asia/Jakarta");
        echo date("d/m/Y h:i:a"); ?>">

        <div class="form-field">
            <input type="submit" class="btn btn-primary" value="submit" name="create">
        </div>
    </form>
</div>

<?php
include ("components/footer.php");
?>