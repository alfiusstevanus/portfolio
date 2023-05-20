<?php
include '../server/connection.php';

$keahlian = $_POST['keahlian'];
$deskripsi = $_POST['deskripsi'];
$picture = str_replace(' ', '-', $keahlian) . ".jpg";

if (!empty($_FILES['photo']['tmp_name'])) {
    $temp = $_FILES['photo']['tmp_name'];
    move_uploaded_file($temp, "../images/" . $picture);
}

$query = "INSERT INTO skills VALUES('','$keahlian','$deskripsi','$picture')";

if (mysqli_query($conn, $query)) {
    $success = true;
} else {
    $success = false;
}

header("location:../index.php?created=$success");
die();
