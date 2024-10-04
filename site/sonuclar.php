<?php
// Veritabanına bağlanma
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "futbol_anket";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Bağlantı hatası: " . $conn->connect_error);
}

// Veritabanından futbol takımı verilerini çekme
$sql = "SELECT futbol_takimi, COUNT(futbol_takimi) as sayi FROM anket_cevaplari GROUP BY futbol_takimi";
$result = $conn->query($sql);

// Grafik verileri için boş diziler
$takimlar = [];
$sayilar = [];

if ($result->num_rows > 0) {
  // Verileri diziye ekleme
  while($row = $result->fetch_assoc()) {
    $takimlar[] = $row['futbol_takimi'];
    $sayilar[] = $row['sayi'];
  }
} else {
  echo "Veri bulunamadı.";
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Futbol Anket Sonuçları</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        body {
            background-color: black;
            color: white;
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
            color: white;
            margin-left: 20px;
            text-decoration: none;
        }
        .chart-container {
            width: 40%;
            margin: 50px auto;
            background-color: rgba(255, 255, 255, 0.1);
            padding: 20px;
            border-radius: 10px;
        }
    </style>
</head>
<body>

    <div class="navbar">
        <div class="navbar-logo">Futbol Anketi</div>
        <div class="navbar-sekmeler">
            <a href="anketdeneme.php">Anasayfa</a>
            <a href="#">Sonuçlar</a>
            
        </div>
    </div>

    <div class="chart-container">
        <h2>Futbol Takımı Tercihleri</h2>
        <canvas id="myPieChart"></canvas>
    </div>

    <script>
        var ctx = document.getElementById('myPieChart').getContext('2d');
        var myPieChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: <?php echo json_encode($takimlar); ?>, // PHP'den gelen takım isimleri
                datasets: [{
                    data: <?php echo json_encode($sayilar); ?>, // PHP'den gelen takım sayıları
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.6)',
                        'rgba(54, 162, 235, 0.6)',
                        'rgba(255, 206, 86, 0.6)',
                        'rgba(75, 192, 192, 0.6)',
                        'rgba(153, 102, 255, 0.6)',
                        'rgba(255, 159, 64, 0.6)'
                    ]
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        labels: {
                            color: 'white' // Efsane yazıları beyaz olsun
                        }
                    }
                }
            }
        });
    </script>

</body>
</html>