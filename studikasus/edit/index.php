<!DOCTYPE html>
<html>

<body>
    <h2>Form Edit Persampahan</h2>
    <?php
    $servername = "localhost";
    $username   = "root";
    $password   = "";
    $dbname     = "studikasus";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $id = $_GET['id'];
    $sql = "SELECT * FROM data_persampahan WHERE id = $id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<form action='edit.php' onsubmit='return validateForm()' method='post'>";
        while ($row = $result->fetch_assoc()) {
            echo "<input type='hidden' name='id' value='" . $row['id'] . "'><br>";
            echo "<label for='nama_fasil'>Nama Fasilitas: </label><br>";
            echo "<input type='text' id='nama_fasil' name='nama_fasil' value='" . $row['nama_fasil'] . "'><br>";
            echo "<label for='kalurahan'>Kalurahan: </label><br>";
            echo "<input type='text' id='kal' name='kalurahan' value='" . $row['kalurahan'] . "'><br>";
            echo "<label for='kapanewon'>Kapanewon: </label><br>";
            echo "<input type='text' id='kap' name='kapanewon' value='" . $row['kapanewon'] . "'><br>";
            echo "<label for='x'>Longitude (X): </label><br>";
            echo "<input type='text' id='x' name='x' value='" . $row['x'] . "'><br>";
            echo "<label for='y'>Latitude (Y): </label><br>";
            echo "<input type='text' id='y' name='y' value='" . $row['y'] . "'><br>";
            echo "<label for='status'>Status: </label><br>";
            echo "<input type='text' id='status' name='status' value='" . $row['status'] . "'><br>";
            echo "<label for='alamat'>Alamat: </label><br>";
            echo "<input type='text' id='alamat' name='alamat' value='" . $row['alamat'] . "'><br><br>";
        }
        echo "<input type='submit' value='Submit'>";
        echo "</form>";
    }
    ?>
    <p id="informasi"></p>
    <script>
        function validateForm() {
            let x = document.getElementById("x").value;
            let text = "";
            if (isNaN(x) || x === "") {
                text = "Data Longitude (X) harus berupa angka";
                event.preventDefault();
            }
            document.getElementById("informasi").innerHTML = text;
        }
    </script>
</body>

</html>