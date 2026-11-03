<?php
$id         = $_POST['id'];
$nama_fasil = $_POST['nama_fasil'];
$kalurahan  = $_POST['kalurahan'];
$kapanewon  = $_POST['kapanewon'];
$x          = $_POST['x'];
$y          = $_POST['y'];
$status     = $_POST['status'];
$alamat     = $_POST['alamat'];

$servername = "localhost";
$username   = "root";
$password   = "";
$dbname     = "studikasus";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "UPDATE data_persampahan SET 
        nama_fasil='$nama_fasil', 
        kalurahan='$kalurahan', 
        kapanewon='$kapanewon', 
        x=$x, 
        y=$y, 
        status='$status', 
        alamat='$alamat' 
        WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    echo "Record edited successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
header("Location: ../index.php");