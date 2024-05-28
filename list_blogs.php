<?php
include('config.php');
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bloglar</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <h2>Blog Yazıları</h2>
        <ul>
            <?php
            $sql = "SELECT * FROM blogs ORDER BY created_at DESC";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<li><h3>" . htmlspecialchars($row['title']) . "</h3>";
                    echo "<p>" . nl2br(htmlspecialchars($row['content'])) . "</p>";
                    echo "<small>Yayınlanma Tarihi: " . $row['created_at'] . "</small></li><hr>";
                }
            } else {
                echo "<li>Henüz blog yazısı yok.</li>";
            }

            $conn->close();
            ?>
        </ul>
    </div>
    <footer>
        <p>&copy; 2024 Hobi Kulübü Yönetim Sistemi | <a href="https://github.com/UmutKocatepe/Gym-Kulubu-Yonetim-Uygulamasi.git">GitHub Proje Linki</a></p>
    </footer>
</body>

</html>