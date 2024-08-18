<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Doctor Prescription Form</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
  <link rel="stylesheet" href="assets/style.css">
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
  <h1>Order Form</h1>
  <p>Silahkan masukkan Nama, Umur, Alamat Email, Nomer Handphone, dan Gejala.</p>
  <form action="orderlist.php" method="post">
    <div class="order-form">
      <label for="patientName">Nama Pasien:</label>
      <input type="text" id="patientName" name="patientName" required>
    </div>
    <div class="order-form">
      <label for="patientAge">Umur:</label>
      <input type="number" id="patientAge" name="patientAge" required>
    </div>
    <div class="order-form">
      <label for="email">Email:</label>
      <input type="email" id="email" name="email" required>
    </div>
    <div class="order-form">
      <label for="phone">Nomer Handphone:</label>
      <input type="tel" id="phone" name="phone" required>
    </div>
    <label for="">Gender</label>
    <div class=" gender-group">
      <div class="radio-option">
        <input type="radio" id="male" name="gender" value="male">
        <label for="male">Laki-Laki</label>
      </div>
      <div class="radio-option">
        <input type="radio" id="female" name="gender" value="female">
        <label for="female">Perempuan</label>
      </div>
      <div class="radio-option">
        <input type="radio" id="other" name="gender" value="other">
        <label for="other">Other</label>
      </div>
    </div>
    <div class="order-form">
      <label for="symptoms">Gejala:</label>
      <textarea id="symptoms" name="symptoms" rows="4" cols="50" required></textarea>
    </div>
    <div class="order-form">
      <label for="diagnosis">Diagnosis:</label>
      <select name="diagnosis" id="diagnosis">
        <option value="">Select Diagnosis</option>
        <option value="flu">Flu</option>
        <option value="cold">Cold</option>
        <option value="fever">Fever</option>
        <option value="cough">Cough</option>
        <option value="inflammation">Inflammation</option>
        <option value="other">Other</option>
      </select>
    </div>
    <div class="order-form">
      <label for="prescription">Resep:</label>
      <textarea id="prescription" name="prescription" rows="4" cols="50" required></textarea>
    </div>
    <div class="order-form">
      <label for="certification">
        <input type="checkbox" id="certification" name="certification" required>
        Saya menyatakan bahwa informasi di atas adalah benar dan akurat.
      </label>
    </div>
    <button type="submit">Submit</button>
  </form>
</body>

</html>