<?php
include '../server/connection.php';

$id = $_GET["id"];
$q = "SELECT keahlian FROM skills where id = '$id'";
$result = mysqli_query($conn, $q);
$row = mysqli_fetch_assoc($result);
$keahlian = $row["keahlian"];

//menghapus foto di folder images
$path = "../images/" . str_replace(' ', '-', $keahlian) . ".jpg";
if (file_exists($path)) {
    unlink($path);
}

$query = "DELETE FROM skills WHERE id = '$id'";
if (mysqli_query($conn, $query)) {
    $success = true;
} else {
    $success = false;
}
header("location:../index.php?deleted=$success");

die();
