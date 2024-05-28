<?php
include('config.php');
session_start();

// Kullanıcının giriş yapıp yapmadığını kontrol et
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

$user_id = $_SESSION['user_id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $week = $_POST['week'];
    $note = $_POST['note'];

    $sql = "INSERT INTO workout_notes (user_id, week, note) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iis", $user_id, $week, $note);

    if ($stmt->execute() === TRUE) {
        echo "Antrenman notu başarıyla eklendi.";
    } else {
        echo "Hata: " . $stmt->error;
    }

    $stmt->close();
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Antrenman Notları</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <h1>Antrenman Notlarım</h1>
        <form method="post" action="">
            Hafta: <input type="number" name="week" required><br>
            Not: <textarea name="note" rows="5" required></textarea><br>
            <input type="submit" value="Not Ekle">
            <a href="dashboard.php" class="button">Dashboard</a>

        </form>
        <h2>Önceki Notlarım</h2>
        <ul>
            <?php
            $sql = "SELECT week, note, created_at FROM workout_notes WHERE user_id = ? ORDER BY created_at DESC";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("i", $user_id);
            $stmt->execute();
            $result = $stmt->get_result();

            while ($row = $result->fetch_assoc()) {
                echo "<li><strong>Hafta " . htmlspecialchars($row['week']) . ":</strong> " . htmlspecialchars($row['note']) . " <em>(" . $row['created_at'] . ")</em></li>";
            }

            $stmt->close();
            ?>
        </ul>
    </div>
</body>

</html>