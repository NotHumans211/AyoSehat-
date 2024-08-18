<?php

session_start();

if (!isset($_SESSION['login_user']) || $_SESSION['user_role'] != 'admin') {
    if ($_SESSION['user_role'] == 'user') {
        header("location: index.php");
    }
    require 'function.php';
    exit();
}

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

$sqlOrder = "SELECT id, nama, umur, email, nohp, gender, gejala, diagnosis, resep FROM orderr";
$resultOrder = $conn->query($sqlOrder);

$sqlrujuk = "SELECT id, nama, umur, email, nohp, gender, gejala, hospital, certification FROM rujuk";
$resultrujuk = $conn->query($sqlrujuk);

$totalUsers = 150;  
$newOrders = 23;    

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        h1 {
            color: #333;
        }

        .overview {
            display: flex;
            gap: 20px;
            margin-top: 20px;
        }

        .overview-card {
            background-color: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .overview-card h2 {
            margin: 0;
            font-size: 24px;
            color: #e74c3c;
        }

        .overview-card p {
            margin: 5px 0 0;
            font-size: 16px;
            color: #333;
        }

        table {
            width: 100%;
            max-width: 1200px;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #e74c3c;
            color: white;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        .logout-container {
            position: absolute;
            top: 20px;
            right: 20px;
        }

        .logout-button {
            padding: 10px 20px;
            background-color: #e74c3c;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        .logout-button:hover {
            background-color: #c0392b;
        }

        .action-button {
            padding: 5px 10px;
            background-color: black;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 14px;
            text-decoration: none;
            display: inline-block;
        }

        .action-button.update {
            background-color: green;
        }

        .action-button.delete {
            background-color: red;
        }

        .action-button.update:hover {
            background-color: darkgreen;
        }

        .action-button.delete:hover {
            background-color: darkred;
        }

        .action-links {
            display: flex;
            gap: 5px;
        }

        .chart-container {
            width: 100%;
            max-width: 1200px;
            margin-top: 20px;
        }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>
    <div class="logout-container">
        <form action="logout.php" method="post">
            <button type="submit" class="logout-button">Logout</button>
        </form>
    </div>

    <h1>Admin Dashboard</h1>

    <div class="overview">
        <div class="overview-card">
            <h2><?php echo $totalUsers; ?></h2>
            <p>Total Users</p>
        </div>
        <div class="overview-card">
            <h2><?php echo $newOrders; ?></h2>
            <p>New Orders</p>
        </div>
    </div>

    <div class="chart-container">
        <canvas id="userChart"></canvas>
    </div>

    <table>
        <tr>
            <th>NO</th>
            <th>Nama</th>
            <th>Umur</th>
            <th>Email</th>
            <th>No HP</th>
            <th>Gender</th>
            <th>Gejala</th>
            <th>Diagnosis</th>
            <th>Resep</th>
            <th>Aksi</th>
        </tr>
        <?php
        $i = 1;
        if ($resultOrder->num_rows > 0) {
            while ($row = $resultOrder->fetch_assoc()) {
                echo "<tr>
                    <td>" . $i++ . "</td>
                    <td>" . $row["nama"] . "</td>
                    <td>" . $row["umur"] . "</td>
                    <td>" . $row["email"] . "</td>
                    <td>" . $row["nohp"] . "</td>
                    <td>" . $row["gender"] . "</td>
                    <td>" . $row["gejala"] . "</td>
                    <td>" . $row["diagnosis"] . "</td>
                    <td>" . $row["resep"] . "</td>
                    <td>
                        <div class='action-links'>
                            <a href='update.php?id=" . $row["id"] . "' class='action-button update'>Update</a>
                            <a href='delete.php?id=" . $row["id"] . "' class='action-button delete' onclick=\"return confirm('Apakah anda yakin ingin menghapus data ini?');\">Delete</a>
                        </div>
                    </td>
                </tr>";
            }
        } else {
            echo "<tr><td colspan='10'>No records found</td></tr>";
        }
        ?>
    </table>

    <h2>Data Rujukan</h2>

    <table>
        <tr>
            <th>NO</th>
            <th>Nama</th>
            <th>Umur</th>
            <th>Email</th>
            <th>No Hp</th>
            <th>Gender</th>
            <th>Gejala</th>
            <th>Rumah Sakit Rujukan </th>
        </tr>
        <?php
        $j = 1;
        if ($resultrujuk->num_rows > 0) {
            while ($row = $resultrujuk->fetch_assoc()) {
                echo "<tr>
                    <td>" . $j++ . "</td>
                    <td>" . $row["nama"] . "</td>
                    <td>" . $row["umur"] . "</td>
                    <td>" . $row["email"] . "</td>
                    <td>" . $row["nohp"] . "</td>
                    <td>" . $row["gender"] . "</td>
                    <td>" . $row["gejala"] . "</td>
                    <td>" . $row["hospital"] . "</td>
                    <td>" . $row["certification"] . "</td>
                    
                    <td>
                        <div class='action-links'>
                            <a href='update_rujuk.php?id=" . $row["id"] . "' class='action-button update'>Update</a>
                            <a href='delete_rujuk.php?id=" . $row["id"] . "' class='action-button delete' onclick=\"return confirm('Apakah anda yakin ingin menghapus data ini?');\">Delete</a>
                        </div>
                    </td>
                </tr>";
            }
        } else {
            echo "<tr><td colspan='9'>No records found</td></tr>";
        }
        $conn->close();
        ?>
    </table>

    <script>
        const ctx = document.getElementById('userChart').getContext('2d');
        const userChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
                datasets: [{
                    label: 'Pengguna Baru',
                    data: [10, 15, 30, 40, 60, 70, 90],
                    backgroundColor: 'rgba(231, 76, 60, 0.2)',
                    borderColor: 'rgba(231, 76, 60, 1)',
                    borderWidth: 2,
                    fill: true
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false
            }
        });
    </script>

</body>

</html>
