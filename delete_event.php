<?php
include 'config.php';
session_start();

// Kullanıcının giriş yapıp yapmadığını ve yetkilendirilmiş kullanıcı olup olmadığını kontrol et
if (!isset($_SESSION['user_id']) || !isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();
}

// Yetkilendirilmiş kullanıcıları belirlemek için bir kontrol yapılabilir
// Örneğin, sadece admin kullanıcıları etkinlikleri silebilir
if ($_SESSION['user_role'] != 'admin') {
    // Yetkilendirilmiş kullanıcı değilse ana sayfaya yönlendir
    header('Location: index.php');
    exit();
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM events WHERE id=?"; // Parametreli sorgu kullanımı

    // Parametreli sorgu hazırlama
    $stmt = $conn->prepare($sql);
    // Parametreleri bağlama
    $stmt->bind_param("i", $id);
    // Sorguyu çalıştırma
    if ($stmt->execute()) {
        echo "Event deleted successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $stmt->close(); // Sorgu kapama
}
?>
<!DOCTYPE html>
<html lang="tr">

<head>
    <title>Delete Event</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <h2>Delete Event</h2>
    <p>The event has been deleted.</p>
    <a href="list_events.php">Back to Events List</a>
</body>

</html>