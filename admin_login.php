<?php
include('config.php');
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT id, username, password FROM users WHERE username = ? AND role = 'admin'";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $db_password = $row['password'];

        if ($password === $db_password) {
            // Giriş başarılı, admin oturumunu başlat
            $_SESSION['admin_id'] = $row['id'];
            $_SESSION['admin_username'] = $username;
            header("Location: admin_dashboard.php");
            exit();
        } else {
            echo "Geçersiz kullanıcı adı veya şifre.";
        }
    } else {
        echo "Geçersiz kullanıcı adı veya şifre.";
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
    <title>Admin Login</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <h2>Admin Girişi</h2>
        <form method="post" action="">
            <label for="username">Kullanıcı Adı:</label>
            <input type="text" id="username" name="username" required><br><br>
            <label for="password">Şifre:</label>
            <input type="password" id="password" name="password" required><br><br>
            <input type="submit" value="Giriş Yap">
        </form>
    </div>
    <footer>
        <p>&copy; 2024 Hobi Kulübü Yönetim Sistemi | <a href="https://github.com/UmutKocatepe/Gym-Kulubu-Yonetim-Uygulamasi.git">GitHub Proje Linki</a></p>
    </footer>
</body>

</html>