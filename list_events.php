<?php
include 'config.php';
session_start();

$sql = "SELECT * FROM events";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Etkinlik Listesi</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <div class="container">
        <h1>Etkinlik Listesi</h1>
        <ul>
            <?php while ($row = $result->fetch_assoc()) { ?>
                <li>
                    <h2><?php echo $row['event_name']; ?></h2>
                    <p><?php echo $row['description']; ?></p>
                    <p><?php echo $row['date']; ?> - <?php echo $row['time']; ?></p>
                    <p><?php echo $row['location']; ?></p>
                </li>
            <?php } ?>
        </ul>
        <div>
            <h1>Arkadaşlarınla Paylaş</h2>
                <!-- Facebook paylaşım bağlantısı -->
                <a href="https://www.facebook.com/sharer/sharer.php?u=<URL>&t=<BAŞLIK>" class="fa fa-facebook" target="_blank" alt="Facebook"></a>
                <!-- Twitter paylaşım bağlantısı -->
                <a href="https://twitter.com/intent/tweet?url=<URL>&text=<BAŞLIK>" class="fa fa-twitter" target="_blank"></a>
                <!-- Instagram paylaşım bağlantısı -->
                <a href="https://www.instagram.com/" class="fa fa-instagram" target="_blank"></a>
        </div>
    </div>



    <footer>
        <p>&copy; 2024 Hobi Kulübü Yönetim Sistemi | <a href="https://github.com/UmutKocatepe/Gym-Kulubu-Yonetim-Uygulamasi.git">GitHub Proje Linki</a></p>
    </footer>
</body>

</html>