<?php

if (isset($_POST["create"])) {
    include ("../app/koneksi.php");

    $title = mysqli_real_escape_string($koneksi, $_POST["title"]);
    $summary = mysqli_real_escape_string($koneksi, $_POST["summary"]);
    $content = mysqli_real_escape_string($koneksi, $_POST["content"]);
    $date = mysqli_real_escape_string($koneksi, $_POST["date"]);

    echo $title;
    echo $summary;
    echo $content;
    echo $date;

    $create_insert = "INSERT INTO posts
    (title, summary, content, date) 
    VALUES 
    ('$title', '$summary', '$content', '$date')";

    if(mysqli_query($koneksi, $create_insert)){
        echo "masuk db";
    }else {
        die("data tidak masuk");
    }
}

?>