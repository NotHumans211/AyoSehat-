<?php
$servername = "localhost";  
$username = "root";         
$password = "";             
$dbname = "login";  

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['patientName'];
    $age = $_POST['patientAge'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $gender = $_POST['gender'];
    $symptoms = $_POST['symptoms'];
    $diagnosis = $_POST['diagnosis'];
    $prescription = $_POST['prescription'];

    $sql = "INSERT INTO orderr (nama, umur, email, nohp, gender, gejala, diagnosis, resep)
  VALUES ('$name', '$age', '$email', '$phone', '$gender', '$symptoms', '$diagnosis', '$prescription')";

    if ($conn->query($sql) === TRUE) {
        echo '
        <script>
            alert("data order berhasil ditambahkan");
            window.location.href="index.php";
        </script>
        ';
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
