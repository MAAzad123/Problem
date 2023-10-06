<?php 
include '../env.php';
$postID = $_REQUEST ['id'];
$query = "DELETE FROM posts where id = '$postID'";
$result = mysqli_query($conn, $query);

header("Location: ./../list.php");
?>