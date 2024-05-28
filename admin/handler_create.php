<?php 

if (isset($_POST["create"])) {
    $title = $_POST["title"];
    $summary = $_POST["summary"];
    $content = $_POST["content"];
    $date = $_POST["date"];

    echo $title;
    echo $summary;
    echo $content;
    echo $date;
}

?>