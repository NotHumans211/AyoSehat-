<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Refer to Hospital Form</title>
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

    .rujuk-form {
      margin-bottom: 15px;
    }

    .rujuk-form label {
      display: block;
      margin-bottom: 5px;
      color: #333;
    }

    .rujuk-form input,
    .rujuk-form select,
    .rujuk-form textarea {
      width: 100%;
      padding: 10px;
      border: 1px solid #ddd;
      border-radius: 5px;
      font-size: 16px;
      color: #333;
      box-sizing: border-box;
    }

    .rujuk-form input[type="radio"] {
      width: auto;
      margin-right: 5px;
    }

    .rujuk-form input[type="checkbox"] {
      width: auto;
      margin-right: 10px;
    }

    .rujuk-form textarea {
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

    .rujuk-form input:focus,
    .rujuk-form select:focus,
    .rujuk-form textarea:focus {
      border-color: #b4b4b4;
      outline: none;
    }

    .rujuk-form .gender-group {
      display: flex;
      align-items: center;
    }

    .rujuk-form .gender-group .radio-option {
      display: flex;
      align-items: center;
      margin-right: 20px;
    }

    .rujuk-form .gender-group label {
      margin: 0;
      margin-left: 5px;
    }
  </style>
</head>

<body>
  <h1>Refer to Hospital Form</h1>
  <p>Silahkan masukkan Nama, Umur, Alamat Email, Nomer Handphone, Gejala, dan Rumah Sakit Tujuan.</p>
  <form action="rujuk.php" method="post">
    <div class="rujuk-form">
      <label for="patientName">Nama Pasien:</label>
      <input type="text" id="patientName" name="patientName" required>
    </div>
    <div class="rujuk-form">
      <label for="patientAge">Umur:</label>
      <input type="number" id="patientAge" name="patientAge" required>
    </div>
    <div class="rujuk-form">
      <label for="email">Email:</label>
      <input type="email" id="email" name="email" required>
    </div>
    <div class="rujuk-form">
      <label for="phone">Nomer Handphone:</label>
      <input type="tel" id="phone" name="phone" required>
    </div>
    <div class="rujuk-form">
      <label for="">Gender</label>
      <div class="gender-group">
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
    </div>
    <div class="rujuk-form">
      <label for="symptoms">Gejala:</label>
      <textarea id="symptoms" name="symptoms" rows="4" cols="50" required></textarea>
    </div>
    <div class="rujuk-form">
      <label for="hospital">Rumah Sakit Tujuan:</label>
      <select name="hospital" id="hospital" required>
        <option value="">Pilih Rumah Sakit</option>
        <option value="RS1">Rumah Sakit Bakti Husada</option>
        <option value="RS2">Rumah Sakit Primadona</option>
        <option value="RS3">Rumah Sakit Siti Hajar</option>
        <option value="RS4">Rumah Sakit Negri Pasuruan</option>
        <option value="RS5">Rumah Sakit Aisyah</option>
        <option value="RS5">Rumah Sakit Permata</option>
        <option value="RS5">Rumah Sakit Negri Bangil</option>

      </select>
    </div>
    <div class="rujuk-form">
      <label for="certification">
        <input type="checkbox" id="certification" name="certification" required>
        Saya menyatakan bahwa informasi di atas adalah benar dan akurat.
      </label>
    </div>
    <button type="submit">Submit</button>
  </form>
</body>

</html>