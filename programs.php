<?php
session_start();
include('config.php');

if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();
}

$username = $_SESSION['username'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Örnek Programlar</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <header>
        <div class="container">
            <h1>Hoşgeldiniz, <?php echo htmlspecialchars($username); ?></h1>
            <nav>
                <ul>
                    <li><a href="dashboard.php">Dashboard</a></li>
                    <li><a href="logout.php">Çıkış Yap</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <div class="container">
        <h2>Başlangıç,Orta Seviye Programlar</h2>
        <ul>
            <li><a href="https://www.agirsaglam.com/fitness-antrenman-programlari/#a%C4%9F%C4%B1rsa%C4%9Flam-5%C3%975-fitness-antrenman-program%C4%B1">5x5 Programı</a></li>
            <li><a href="https://www.agirsaglam.com/fitness-antrenman-programlari/#a%C4%9F%C4%B1rsa%C4%9Flam-3%C3%975-v%C3%BCcut-geli%C5%9Ftirme-program%C4%B1">3x5 Programı</a></li>
        </ul>
        <h2>Orta,İleri Seviye Programlar</h2>
        <ul>
            <li><a href="http://www.canditotraininghq.com/free-programs/">Candito 6 Week Programı</a></li>
            <li><a href="https://www.balkayatraining.com/e-kitaplar/">Balkaya Texas Programı</a></li>
        </ul>
        <p>If you want many other free programs, you can check this site: <a href="https://liftvault.com/search/">Lift Vault</a>.</p>
        <p>Blog of basic tips for increasing strength: <a href="list_blogs.php">Blog</a></p>

    </div>
</body>

</html>