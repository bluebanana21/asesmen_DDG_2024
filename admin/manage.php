<?php
include ("components/header.php");
?>

<?php
// include_once "menu.php";
include "../app/check_login.php";
include "../app/koneksi.php";
$user = $_SESSION['user_login'];
?>

<div class="posts-list w-100 p-5">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th style="width:15%">Publication date</th>
                <th style="width:15%">Title</th>
                <th style="width:30%">Article</th>
                <th style="width:15%">Image</th>
                <th style="width:25%">Action</th>
            </tr>
        </thead>
        <tbody>

            <?php
            $user = $_SESSION['user_login'];
            $id_user = $user['id'];
            $berita = $koneksi->query("SELECT * FROM posts WHERE id = $id_user");
            $data = $berita->fetch_all();

            include ("../app/koneksi.php");
            $sqlSelect = "SELECT * FROM posts";
            $result = mysqli_query($koneksi, $sqlSelect);
            while ($data = mysqli_fetch_array($result)) {
                ?>
                <tr>
                    <td><?php echo $data["date"] ?></td>
                    <td><?php echo $data["title"] ?></td>
                    <td><?php echo $data["summary"] ?></td>
                    <td><img src="../Assets/images/<?php echo $data["image"] ?>" width="60%" height="60%" alt=""></td>

                    <td>
                        <a class="btn btn-info" href="view.php?id=<?php echo $data["id"] ?>">View</a>
                        <a class="btn btn-warning" href="edit.php?id=<?php echo $data["id"] ?>">Edit</a>
                        <a class="btn btn-danger" href="delete.php?id=<?php echo $data["id"] ?>">Delete</a>
                    </td>
                </tr>
                <?php
            }
            ?>
        </tbody>
    </table>

</div>

<?php
include ("components/footer.php");
?>