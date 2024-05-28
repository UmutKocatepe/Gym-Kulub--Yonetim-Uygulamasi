<?php
include('config.php');
session_start();

// Kullanıcının giriş yapıp yapmadığını kontrol et
if (!isset($_SESSION['user_id']) || !isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();
}

$username = $_SESSION['username'];
$role = $_SESSION['role'];
?>
<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <header>
        <div class="container">
            <h1>Hoşgeldiniz, <?php echo htmlspecialchars($username); ?></h1>
            <nav>
                <ul>
                    <?php if ($role === 'admin') { ?>
                        <li><a href="add_info.php">Bilgi Ekle</a></li>
                        <li><a href="add_event.php">Etkinlik Ekle</a></li>
                    <?php } ?>
                    <li><a href="list_events.php">Etkinlikler</a></li>
                    <li><a href="workout_notes.php">Antrenman Notlarım</a></li>
                    <li><a href="list_blogs.php">Bloglar</a></li>
                    <li><a href="programs.php">Programlar</a></li>
                    <li><a href="community_forum.php">Topluluk</a></li>
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
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->get_result();

            while ($row = $result->fetch_assoc()) {
                echo "<li>" . htmlspecialchars($row['title']) . " - " . htmlspecialchars($row['content']);
                if ($role === 'admin') {
                    echo " <a href='edit_info.php?id=" . $row['id'] . "'>Düzenle</a> <a href='delete_info.php?id=" . $row['id'] . "'>Sil</a>";
                }
                echo "</li>";
            }
            ?>
        </ul>
    </div>
    <footer>
        <p>&copy; 2024 Hobi Kulübü Yönetim Sistemi | <a href="https://github.com/UmutKocatepe/Gym-Kulubu-Yonetim-Uygulamasi.git">GitHub Proje Linki</a></p>
    </footer>
</body>

</html>