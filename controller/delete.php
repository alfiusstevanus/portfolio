<?php
session_start();
include '../server/connection.php';

$id = $_GET["id"];
// $productName = $_GET["nama"];

// //menghapus foto di folder images
// $path = "../images/" . str_replace(' ', '-', $productName) . ".jpg";
// if (file_exists($path)) {
//     unlink($path);
// }

$query = "DELETE FROM skills WHERE id = '$id'";
if (mysqli_query($conn, $query)) {
    $success = true;
} else {
    $success = false;
}
header("location:../index.php?deleted=$success");

die();
