<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet"
		href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
</head>

<body>

</body>

</html>

<?php
include ("koneksi.php");
function query($query)
{
	global $koneksi;
	$result = mysqli_query($koneksi, $query);
	$rows = [];
	while ($row = mysqli_fetch_assoc($result)) {
		$rows[] = $row;
	}
	return $rows;
}
function cari($keyword)
{
	$query = "SELECT * FROM posts
				WHERE
			  title LIKE '%$keyword%' OR
			  summary LIKE '%$keyword%' OR
			  content LIKE '%$keyword%' OR
			  author LIKE '%$keyword%'
			";
	return query($query);
}

function getComments($koneksi)
{
	

}
?>