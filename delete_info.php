<?php
include('config.php');
session_start();

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM info WHERE id=?"; // Parametreli sorgu kullanımı

    // Parametreli sorguyu hazırlama
    $stmt = $conn->prepare($sql);
    // Parametreyi bağlama
    $stmt->bind_param("i", $id);
    // Sorguyu çalıştırma
    if ($stmt->execute()) {
        $_SESSION['success_message'] = "Bilgi başarıyla silindi.";
    } else {
        $_SESSION['error_message'] = "Bilgi silinirken bir hata oluştu.";
    }

    $stmt->close(); // Sorguyu kapatma
}

header('Location: admin_dashboard.php');
exit();
