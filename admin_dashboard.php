<?php
include('config.php');
session_start();

// Admin'in giriş yapıp yapmadığını kontrol et
if (!isset($_SESSION['admin_id']) || !isset($_SESSION['admin_username'])) {
    header('Location: admin_login.php');
    exit();
}

$admin_username = $_SESSION['admin_username'];
?>
<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <header>
        <div class="container">
            <h1>Hoşgeldiniz, Admin <?php echo htmlspecialchars($admin_username); ?></h1>
            <nav>
                <ul>
                    <li><a href="add_info.php">Bilgi Ekle</a></li>
                    <li><a href="add_event.php">Etkinlik Ekle</a></li>
                    <li><a href="list_events.php">Etkinlikler</a></li>
                    <li><a href="add_blog.php">Blog Ekle</a></li>
                    <li><a href="list_blogs.php">Bloglar</a></li>
                    <li><a href="logout.php">Çıkış Yap</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <div class="container">
        <h2>Bilgiler</h2>
        <ul>
            <?php
            $sql = "SELECT * FROM info";
            $result = $conn->query($sql);

            while ($row = $result->fetch_assoc()) {
                echo "<li>" . htmlspecialchars($row['title']) . " - " . htmlspecialchars($row['content']) . " <a href='edit_info.php?id=" . $row['id'] . "'>Düzenle</a> <a href='delete_info.php?id=" . $row['id'] . "'>Sil</a></li>";
            }
            ?>
        </ul>
    </div>
    <footer>
        <p>&copy; 2024 Hobi Kulübü Yönetim Sistemi | <a href="https://github.com/UmutKocatepe/Gym-Kulubu-Yonetim-Uygulamasi.git">GitHub Proje Linki</a></p>
    </footer>
</body>

</html>