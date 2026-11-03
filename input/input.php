<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $kecamatan = $_POST['kecamatan'];
    $longitude = $_POST['longitude'];
    $latitude = $_POST['latitude'];
    $luas = $_POST['luas'];
    $jumlah_penduduk = $_POST['jumlah_penduduk'];   

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "kecamatann";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "INSERT INTO penduduk (kecamatan, longitude, latitude, luas, jumlah_penduduk)
            VALUES ('$kecamatan', '$longitude', '$latitude', $luas, $jumlah_penduduk)";

    if ($conn->query($sql) === TRUE) {
        echo "Data baru berhasil ditambahkan";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        $conn->close();
    }

    // header("Location: ../index.php");
    //     exit();}
}
