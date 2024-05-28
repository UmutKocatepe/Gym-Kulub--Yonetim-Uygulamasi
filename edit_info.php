<?php
include('config.php');
session_start();

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $title = $_POST['title'];
        $content = $_POST['content'];

        $sql = "UPDATE info SET title=?, content=? WHERE id=?"; // Parametreli sorgu kullanımı

        // Parametreli sorguyu hazırlama
        $stmt = $conn->prepare($sql);
        // Parametreleri bağlama
        $stmt->bind_param("ssi", $title, $content, $id);
        // Sorguyu çalıştırma
        if ($stmt->execute()) {
            echo "Bilgi başarıyla güncellendi.";
        } else {
            echo "Hata: " . $sql . "<br>" . $conn->error;
        }

        $stmt->close(); // Sorguyu kapatma
    }

    $sql = "SELECT * FROM info WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    $stmt->close(); // Sorguyu kapatma
} else {
    header('Location: dashboard.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bilgi Düzenle</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <form method="post" action="">
        Başlık: <input type="text" name="title" value="<?php echo htmlspecialchars($row['title']); ?>" required><br>
        Açıklama: <textarea name="content" required><?php echo htmlspecialchars($row['description']); ?></textarea><br>
        <input type="submit" value="Güncelle">
        <a href="admin_dashboard.php" class="button">Dashboard</a>
    </form>
</body>

</html>