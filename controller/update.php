<?php
include '../server/connection.php';
$keahlian = $_POST['keahlian'];
$deskripsi = $_POST['deskripsi'];
$id = $_GET['id'];
$q = "SELECT keahlian, photo FROM skills where id = '$id'";
$result = mysqli_query($conn, $q);
$row = mysqli_fetch_assoc($result);

$temp = $_FILES['photo']['tmp_name'];
$picture = str_replace(' ', '-', $keahlian) . ".jpg";
$path = '../images/' . $row['photo'];

if (!empty($_FILES['photo']['tmp_name'])) {
    if (file_exists($path)) {
        unlink($path);
    }
    move_uploaded_file($temp, "../images/" . $picture);
} else {
    $picture =  $row['photo'];
}

$query = "UPDATE skills SET keahlian = '$keahlian', deskripsi = '$deskripsi', photo = '$picture' WHERE id = '$id' ";
if (mysqli_query($conn, $query)) {
    $success = true;
} else {
    $success = false;
}

header("location:../index.php?updated=$success");
die();
