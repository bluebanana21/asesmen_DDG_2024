<?php
$id = $_GET["id"];
if ($id) {
    include("../app/koneksi.php");
    $sqlDelete = "DELETE FROM posts WHERE id = $id";
    if (mysqli_query($koneksi, $sqlDelete)) {
        header("Location: manage.php");
    } else {
        echo "data tidak bisa dihapus";
    }
} else {
    echo "Post tidak ditemukan";
}
?>