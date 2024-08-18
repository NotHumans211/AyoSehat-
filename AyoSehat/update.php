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

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $nama = $_POST['patientName'];
    $umur = $_POST['patientAge'];
    $email = $_POST['email'];
    $nohp = $_POST['phone'];
    $gender = $_POST['gender'];
    $gejala = $_POST['symptoms'];
    $diagnosis = $_POST['diagnosis'];
    $resep = $_POST['prescription'];

    $sql = "UPDATE orderr SET nama='$nama', umur='$umur', email='$email', nohp='$nohp', gender='$gender', gejala='$gejala', diagnosis='$diagnosis', resep='$resep' WHERE id='$id'";

    if ($conn->query($sql) === TRUE) {
        header("Location: indexadmin.php");
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

$id = $_GET['id'];
$sql = "SELECT * FROM orderr WHERE id='$id'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Update Order Form</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
  <style>
    body {
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      min-height: 100vh;
      margin: 0;
      background: #f4f4f9;
      font-family: 'Arial', sans-serif;
    }

    h1 {
      color: #333;
      margin-bottom: 10px;
    }

    p {
      color: #666;
      margin-bottom: 20px;
      text-align: center;
      max-width: 400px;
    }

    form {
      background: #fff;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
      width: 100%;
      max-width: 500px;
      margin: 0 auto;
    }

    .order-form {
      margin-bottom: 15px;
    }

    .order-form label {
      display: block;
      margin-bottom: 5px;
      color: #333;
    }

    .order-form input,
    .order-form select,
    .order-form textarea {
      width: 100%;
      padding: 10px;
      border: 1px solid #ddd;
      border-radius: 5px;
      font-size: 16px;
      color: #333;
      box-sizing: border-box;
    }

    .order-form input[type="radio"] {
      width: auto;
      margin-right: 5px;
    }

    .order-form input[type="checkbox"] {
      width: auto;
      margin-right: 10px;
    }

    .order-form textarea {
      resize: vertical;
    }

    button {
      width: 100%;
      padding: 10px 20px;
      background: #e74c3c;
      color: #fff;
      border: none;
      border-radius: 5px;
      font-size: 16px;
      cursor: pointer;
      transition: background 0.3s;
    }

    button:hover {
      background: #c0392b;
    }

    .order-form input:focus,
    .order-form select:focus,
    .order-form textarea:focus {
      border-color: #b4b4b4;
      outline: none;
    }

    .order-form .gender-group {
      display: flex;
      align-items: center;
    }

    .order-form .gender-group .radio-option {
      display: flex;
      align-items: center;
      margin-right: 20px;
    }

    .order-form .gender-group label {
      margin: 0;
      margin-left: 5px;
    }
    
  </style>
</head>

<body>
  <h1>Update Form</h1>
  <p>Update the information below and submit.</p>
  <form action="update.php" method="post">
    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
    <div class="order-form">
      <label for="patientName">Nama Pasien:</label>
      <input type="text" id="patientName" name="patientName" value="<?php echo $row['nama']; ?>" required>
    </div>
    <div class="order-form">
      <label for="patientAge">Umur:</label>
      <input type="number" id="patientAge" name="patientAge" value="<?php echo $row['umur']; ?>" required>
    </div>
    <div class="order-form">
      <label for="email">Email:</label>
      <input type="email" id="email" name="email" value="<?php echo $row['email']; ?>" required>
    </div>
    <div class="order-form">
      <label for="phone">Nomer Handphone:</label>
      <input type="tel" id="phone" name="phone" value="<?php echo $row['nohp']; ?>" required>
    </div>
    <label for="">Gender</label>
    <div class=" gender-group">
      <div class="radio-option">
        <input type="radio" id="male" name="gender" value="male" <?php if($row['gender'] == 'male') echo 'checked'; ?>>
        <label for="male">Laki-Laki</label>
      </div>
      <div class="radio-option">
        <input type="radio" id="female" name="gender" value="female" <?php if($row['gender'] == 'female') echo 'checked'; ?>>
        <label for="female">Perempuan</label>
      </div>
      <div class="radio-option">
        <input type="radio" id="other" name="gender" value="other" <?php if($row['gender'] == 'other') echo 'checked'; ?>>
        <label for="other">Other</label>
      </div>
    </div>
    <div class="order-form">
      <label for="symptoms">Gejala:</label>
      <textarea id="symptoms" name="symptoms" rows="4" cols="50" required><?php echo $row['gejala']; ?></textarea>
    </div>
    <div class="order-form">
      <label for="diagnosis">Diagnosis:</label>
      <select name="diagnosis" id="diagnosis">
        <option value="">Select Diagnosis</option>
        <option value="flu" <?php if($row['diagnosis'] == 'flu') echo 'selected'; ?>>Flu</option>
        <option value="cold" <?php if($row['diagnosis'] == 'cold') echo 'selected'; ?>>Cold</option>
        <option value="other" <?php if($row['diagnosis'] == 'other') echo 'selected'; ?>>Other</option>
      </select>
    </div>
    <div class="order-form">
      <label for="prescription">Resep:</label>
      <textarea id="prescription" name="prescription" rows="4" cols="50" required><?php echo $row['resep']; ?></textarea>
    </div>
    <div class="order-form">
      <label for="certification">
        <input type="checkbox" id="certification" name="certification" required>
        Saya menyatakan bahwa informasi di atas adalah benar dan akurat.
      </label>
    </div>
    <button type="submit" name="update">Update</button>
  </form>
</body>

</html>

<?php
$conn->close();
?>
