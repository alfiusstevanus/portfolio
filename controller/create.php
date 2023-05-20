<?php
include '../server/connection.php';

$keahlian = $_POST['keahlian'];
$deskripsi = $_POST['deskripsi'];

// if (!empty($_FILES['picture']['tmp_name'])) {
//     $temp = $_FILES['picture']['tmp_name'];
//     $picture = str_replace(' ', '-', $productName) . ".jpg";
//     move_uploaded_file($temp, "../images/" . $picture);
// } else {
//     $picture = str_replace(' ', '-', $productName) . ".jpg";
// }

$query = "INSERT INTO skills VALUES('','$keahlian','$deskripsi')";

if (mysqli_query($conn, $query)) {
    $success = true;
} else {
    $success = false;
}

header("location:../index.php?created=$success");
die();
