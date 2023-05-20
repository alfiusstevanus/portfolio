<?php
// session_start();
include '../server/connection.php';
$keahlian = $_POST['keahlian'];
$deskripsi = $_POST['deskripsi'];
$id = $_GET['id'];

echo $keahlian;
echo $deskripsi;
echo $id;

$query = "UPDATE skills SET keahlian = '$keahlian', deskripsi = '$deskripsi' WHERE id = '$id' ";
if (mysqli_query($conn, $query)) {
    $success = true;
} else {
    $success = false;
}

header("location:../index.php?updated=$success");
die();

// $temp = $_FILES['picture']['tmp_name'];
// $picture = str_replace(' ', '-', $productName) . ".jpg";
// $path = '../images/' . $_SESSION['photo'];

// if (!empty($_FILES['picture']['tmp_name'])) {
//     if (file_exists($path)) {
//         unlink($path);
//     }
//     move_uploaded_file($temp, "../images/" . $picture);
// } else {
//     $picture =  $_SESSION['photo'];
// }