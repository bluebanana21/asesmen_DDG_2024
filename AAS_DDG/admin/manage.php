<?php
include ("components/header.php");

include ("../app/checkLogin.php");
include ("../app/koneksi.php");
$user = $_SESSION['user_login'];
?>



<!-- <h1>Hello, <?php echo $user['username']; ?></h1> -->
<!-- <br> -->
<div class="posts-list w-100 p-5">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th style="width:15%">Publication date</th>
                <th style="width:15%">Title</th>
                <th style="width:25%">Article</th>
                <th style="width:10%">Author</th>
                <th style="width:15%">Image</th>
                <th style="width:25%">Action</th>
            </tr>
        </thead>
        <tbody>

            <?php
            include ("../app/koneksi.php");
            $sqlSelect = "SELECT * FROM posts";
            $result = mysqli_query($koneksi, $sqlSelect);
            while ($data = mysqli_fetch_array($result)) {
                if ($data["author"] == $user['username']) {
                    # code...
                    ?>
                    <tr>
                        <td><?php echo $data["date"] ?></td>
                        <td><?php echo $data["title"] ?></td>
                        <td><?php echo $data["summary"] ?></td>
                        <td><?php echo $data["author"] ?></td>
                        <td><img src="../Assets/images/<?php echo $data["image"] ?>" width="60%" height="60%" alt=""></td>

                        <td>
                            <a class="btn btn-info" href="view.php?id=<?php echo $data["id"] ?>">View</a>
                            <a class="btn btn-warning" href="edit.php?id=<?php echo $data["id"] ?>">Edit</a>
                            <a class="btn btn-danger" href="delete.php?id=<?php echo $data["id"] ?>">Delete</a>
                        </td>
                    </tr>
                    <?php
                }
            }
            ?>
        </tbody>
    </table>

</div>

<?php
include ("components/footer.php");
?>