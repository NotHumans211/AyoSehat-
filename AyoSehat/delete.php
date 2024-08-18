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

$id = $_GET['id'];
$sql = "DELETE FROM orderr WHERE id='$id'";

if ($conn->query($sql) === TRUE) {
    header("Location: indexadmin.php");
} else {
    echo "Error deleting record: " . $conn->error;
}

$conn->close();
?>
