<?php
include 'config.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $event_name = $_POST['event_name'];
    $description = $_POST['description'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $location = $_POST['location'];

    $sql = "INSERT INTO events (event_name, description, date, time, location) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssss", $event_name, $description, $date, $time, $location);

    if ($stmt->execute() === TRUE) {
        echo "Etkinlik başarıyla eklendi.";
    } else {
        echo "Hata: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Etkinlik Ekle</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <form method="post" action="">
            <h1>Etkinlik Ekle</h1>
            Etkinlik Adı: <input type="text" name="event_name" required><br>
            Açıklama: <textarea name="description" required></textarea><br>
            Tarih: <input type="date" name="date" required><br>
            Saat: <input type="time" name="time" required><br>
            Konum: <input type="text" name="location" required><br>
            <input type="submit" value="Ekle">
            <a href="admin_dashboard.php" class="button">Dashboard</a>
        </form>
    </div>
    <footer>
        <p>&copy; 2024 Hobi Kulübü Yönetim Sistemi | <a href="https://github.com/UmutKocatepe/Gym-Kulubu-Yonetim-Uygulamasi.git">GitHub Proje Linki</a></p>
    </footer>
</body>

</html>