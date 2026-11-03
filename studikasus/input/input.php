<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
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

    $sql = "INSERT INTO data_persampahan (nama_fasil, kalurahan, kapanewon, x, y, status, alamat)
            VALUES ('$nama_fasil', '$kalurahan', '$kapanewon', $x, $y, '$status', '$alamat')";

    if ($conn->query($sql) === TRUE) {
        echo "Data baru berhasil ditambahkan";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
    header("Location: ../index.php");
}
