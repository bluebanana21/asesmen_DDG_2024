<?php

include ("../app/koneksi.php");
include ("../app/checkLogin.php");
$user = $_SESSION['user_login'];

if (isset($_POST["create"])) {
    include ("../app/koneksi.php");
    // include ("handler_create.php");

    $title = mysqli_real_escape_string($koneksi, $_POST["title"]);
    $summary = mysqli_real_escape_string($koneksi, $_POST["summary"]);
    $content = mysqli_real_escape_string($koneksi, $_POST["content"]);
    $date = mysqli_real_escape_string($koneksi, $_POST["date"]);
    $author = mysqli_real_escape_string($koneksi, $_POST["author"]);
    $id = mysqli_real_escape_string($koneksi, $_POST["id"]);

    $file = $_FILES['image'];

    $fileName = $_FILES['image']['name'];
    $fileTmpName = $_FILES['image']['tmp_name'];
    $fileSize = $_FILES['image']['size'];
    $fileError = $_FILES['image']['error'];
    $fileType = $_FILES['image']['type'];

    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));

    $allowed = array('jpg', 'jpeg', 'png');

    if (in_array($fileActualExt, $allowed)) {
        if ($fileError === 0) {
            if ($fileSize < 5000000) {
                $fileNameNew = uniqid('', true) . "." . $fileActualExt;
                $fileDestination = '../Assets/images/' . $fileNameNew;
                move_uploaded_file($fileTmpName, $fileDestination);

            } else {
                echo "file size os too big";
            }
        } else {
            echo "There was an error uploading your file";
        }
    } else {
        echo "you cannot upload files of this type";
    }

    echo $title;
    echo $summary;
    echo $content;
    echo $date;
    echo $fileNameNew;
    echo $author;

    $create_insert = "INSERT INTO posts
    (title, summary, content, date, image, author) 
    VALUES 
    ('$title', '$summary', '$content', '$date', '$fileNameNew', '$author')";

    if (mysqli_query($koneksi, $create_insert)) {
        echo "masuk db";
        header("Location: manage.php");
    } else {
        die("data tidak masuk");
    }

}


?>

<?php

if (isset($_POST["update"])) {
    include ("../app/koneksi.php");

    $title = mysqli_real_escape_string($koneksi, $_POST["title"]);
    $summary = mysqli_real_escape_string($koneksi, $_POST["summary"]);
    $content = mysqli_real_escape_string($koneksi, $_POST["content"]);
    $date = mysqli_real_escape_string($koneksi, $_POST["date"]);
    $author = mysqli_real_escape_string($koneksi, $_POST["author"]);
    $id = mysqli_real_escape_string($koneksi, $_POST["id"]);
    $file = $_FILES['image'];

    if ($file['error'] === 4) {
        $create_update = "UPDATE posts SET
            title = '$title', summary = '$summary', content = '$content', date = '$date', author = '$author' 
            WHERE id = $id";

        if (mysqli_query($koneksi, $create_update)) {
            header("Location: manage.php");
        } else {
            die("Update did not enter the database");
        }
    } else {  // A file was uploaded
        $fileName = $file['name'];
        $fileTmpName = $file['tmp_name'];
        $fileSize = $file['size'];
        $fileError = $file['error'];
        $fileType = $file['type'];

        $fileExt = explode('.', $fileName);
        $fileActualExt = strtolower(end($fileExt));

        $allowed = array('jpg', 'jpeg', 'png');

        if (in_array($fileActualExt, $allowed)) {
            if ($fileError === 0) {
                if ($fileSize < 5000000) {
                    $fileNameNew = uniqid('', true) . "." . $fileActualExt;
                    $fileDestination = '../Assets/images/' . $fileNameNew;
                    move_uploaded_file($fileTmpName, $fileDestination);

                    $create_update = "UPDATE posts SET
                        title = '$title', summary = '$summary', content = '$content', date = '$date', image = '$fileNameNew', author = '$author' 
                        WHERE id = $id";

                    if (mysqli_query($koneksi, $create_update)) {
                        header("Location: manage.php");
                    } else {
                        die("Update did not enter the database");
                    }
                } else {
                    echo "File size is too big";
                }
            } else {
                echo "There was an error uploading your file";
            }
        } else {
            echo "You cannot upload files of this type";
        }
    }
}
?>

<?php
include ("../app/koneksi.php");
// include ("../app/checkLogin.php");
$user = $_SESSION['user_login'];

if (isset($_POST["comment"])) {
    include ("../app/koneksi.php");
    // include ("handler_create.php");

    // $title = mysqli_real_escape_string($koneksi, $_POST["title"]);
    // $summary = mysqli_real_escape_string($koneksi, $_POST["summary"]);
    $comment = mysqli_real_escape_string($koneksi, $_POST["message"]);
    $date = mysqli_real_escape_string($koneksi, $_POST["date"]);
    $author = mysqli_real_escape_string($koneksi, $_POST["author"]);
    $post_id = mysqli_real_escape_string($koneksi, $_POST["post_id"]);
    
    // $id = mysqli_real_escape_string($koneksi, $_POST["id"]);

    $create_insert = "INSERT INTO comments
    (author, comment, date, post_id) 
    VALUES 
    ('$author', '$comment', '$date', '$post_id')";

    if (mysqli_query($koneksi, $create_insert)) {
        echo "masuk db";
        // header("Location: manage.php");
    } else {
        die("data tidak masuk");
    }

    header("Location: ../app/view.php?id=$post_id");

}
?>

<?php
include ("../app/koneksi.php");
// include ("../app/checkLogin.php");
$user = $_SESSION['user_login'];

if (isset($_POST["like"])) {
    $like = 1;
    // $like++;

    $create_insert = "INSERT INTO comments
    (likes) 
    VALUES 
    ('$like')";
}
?>