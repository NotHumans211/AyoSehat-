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
    $hospital = $_POST['hospital'];
    $certification = isset($_POST['certification']) ? 1 : 0;

    $sql = "INSERT INTO rujuk (nama, umur, email, nohp, gender, gejala, hospital, certification)
    VALUES ('$name', '$age', '$email', '$phone', '$gender', '$symptoms', '$hospital', '$certification')";

    if ($conn->query($sql) === TRUE) {
        echo '
        <script>
            alert("Data rujuk berhasil ditambahkan");
            window.location.href="index.php";
        </script>
        ';
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
