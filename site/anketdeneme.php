<?php
// Veritabanına bağlan
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "futbol_anket";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Bağlantı hatası: " . $conn->connect_error);
}

// Form gönderildiğinde verileri kaydet
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $ad_soyad = $_POST['ad_soyad'];
  $email = $_POST['email'];
  $futbol_takimi = $_POST['futbol_takimi'];

  $sql = "INSERT INTO anket_cevaplari (ad_soyad, email, futbol_takimi) VALUES ('$ad_soyad', '$email', '$futbol_takimi')";

  if ($conn->query($sql) === TRUE) {
    echo "Cevaplar başarıyla kaydedildi!";
  } else {
    echo "Hata: " . $sql . "<br>" . $conn->error;
  }
}
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Futbol Anketi</title>
    <style>
        body {
            background-color: black;
            color: #FFD700;
            font-family: Arial, sans-serif;
        }
        .navbar {
            background-color: #333;
            padding: 10px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .navbar-logo {
            font-size: 24px;
            font-weight: bold;
        }
        .navbar-sekmeler {
            display: flex;
        }
        .navbar-sekmeler a {
            color: #FFD700;
            margin-left: 20px;
            text-decoration: none;
        }
        .form-container {
            background: rgba(255, 255, 255, 0.1);
            padding: 20px;
            margin: 50px auto;
            width: 50%;
            border-radius: 10px;
        }
        input[type="text"], input[type="email"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            background: transparent;
            color: #FFD700;
            border: 1px solid white;
        }
        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #333;
            color: #FFD700;
            border: none;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #555;
        }
    </style>
</head>
<body>

    <div class="navbar">
        <div class="navbar-logo">Futbol Anketi</div>
        <div class="navbar-sekmeler">
        <a href="anketdeneme.php">Anasayfa</a>    
        <a href="sonuclar.php">Sonuçlar</a> 
        
        </div>
    </div>

    <div class="form-container">
        <h2>Favori Futbol Takımınızı Seçin</h2>
        <form method="POST" action="">
            <label for="ad_soyad">Ad Soyad:</label>
            <input type="text" id="ad_soyad" name="ad_soyad" required>
            
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            
            <label for="futbol_takimi">Futbol Takımı (Sadece Türk Takımları):</label>
            <input type="text" id="futbol_takimi" name="futbol_takimi" required>
            
            <input type="submit" value="Gönder">
        </form>
    </div>

</body>
</html>