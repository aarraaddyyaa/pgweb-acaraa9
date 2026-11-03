<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "studikasus";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Mengambil data persampahan
$sql = "SELECT * FROM data_persampahan ORDER BY id ASC";
$result = $conn->query($sql);

echo "<a href='input/index.html' style='color: orange;'>Input data baru</a><br><br>";

if ($result->num_rows > 0) {
    echo "<table border='1px'><tr>
    <th>No</th>
    <th>Nama Fasilitas</th>
    <th>Kalurahan</th>
    <th>Kapanewon</th>
    <th>Longitude (X)</th>
    <th>Latitude (Y)</th>
    <th>Status</th>
    <th>Alamat</th>
    <th colspan='2'>Aksi</th></tr>";

    $no = 1;
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
            <td align='center'>" . $no++ . "</td>
            <td>" . $row["nama_fasil"] . "</td>
            <td>" . $row["kalurahan"] . "</td>
            <td>" . $row["kapanewon"] . "</td>
            <td>" . $row["x"] . "</td>
            <td>" . $row["y"] . "</td>
            <td>" . $row["status"] . "</td>
            <td>" . $row["alamat"] . "</td>
            <td><a href='edit/index.php?id=" . $row["id"] . "'>edit</a></td>
            <td><a href='delete.php?id=" . $row["id"] . "
            'style='color: red;'>hapus</a></td>
        </tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}

$conn->close();
