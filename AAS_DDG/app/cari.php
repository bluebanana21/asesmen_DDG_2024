<?php
require 'functions.php';
$keyword = $_GET['keyword'];
$sql = "SELECT * FROM posts
			WHERE
		 title LIKE '%$keyword%' OR
		 summary LIKE '%$keyword%' OR
		 content LIKE '%$keyword%' OR
		 author LIKE '%$keyword%'
		";
$caripost = query($sql);
?>
?>