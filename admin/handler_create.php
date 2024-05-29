<?php

if (isset($_POST["create"])) {
    include ("../app/koneksi.php");
    // include ("handler_create.php");

    $title = mysqli_real_escape_string($koneksi, $_POST["title"]);
    $summary = mysqli_real_escape_string($koneksi, $_POST["summary"]);
    $content = mysqli_real_escape_string($koneksi, $_POST["content"]);
    $date = mysqli_real_escape_string($koneksi, $_POST["date"]);
    // $image = mysqli_real_escape_string($koneksi, $_POST["image"]);
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
            if ($fileSize < 1000000) {
                $fileNameNew = uniqid('', true) . "." . $fileActualExt;
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

    $create_insert = "INSERT INTO posts
    (title, summary, content, date, image) 
    VALUES 
    ('$title', '$summary', '$content', '$date', '$fileNameNew')";

    if (mysqli_query($koneksi, $create_insert)) {
        echo "masuk db";
    } else {
        die("data tidak masuk");
    }
}


?>