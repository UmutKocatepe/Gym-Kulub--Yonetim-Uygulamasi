<?php
include 'config.php';
session_start();

// Kullanıcının zaten giriş yapıp yapmadığını kontrol et
if (isset($_SESSION['username'])) {
    header('Location: dashboard.php');
    exit();
}


// Login işlemi
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT id, username, password, role FROM users WHERE username=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($id, $username, $hashed_password, $role);

    if ($stmt->fetch() && password_verify($password, $hashed_password)) {
        $_SESSION['user_id'] = $id;
        $_SESSION['username'] = $username;
        $_SESSION['role'] = $role;
        header("Location: dashboard.php");
        exit();
    } else {
        $login_error = "Geçersiz kullanıcı adı veya şifre";
    }

    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giriş Yap</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <h1>Hobi Kulübü Yönetim Sistemi</h1>
        <div class="form-container">
            <!-- Login Form -->
            <form method="post" action="">
                <h2>Giriş Yap</h2>
                <?php if (isset($login_error)) {
                    echo "<p class='error'>$login_error</p>";
                } ?>
                <label for="username">Kullanıcı Adı:</label>
                <input type="text" id="username" name="username" required><br><br>
                <label for="password">Şifre:</label>
                <input type="password" id="password" name="password" required><br><br>
                <input type="submit" name="login" value="Giriş Yap">
                <a href="register.php" class="button">Kayıt Ol</a>
                <a href="admin_login.php" class="button">Admin Girişi</a>
            </form>
        </div>
    </div>
    <footer>
        <p>&copy; 2024 Hobi Kulübü Yönetim Sistemi | <a href="https://github.com/UmutKocatepe/Gym-Kulubu-Yonetim-Uygulamasi.git">GitHub Proje Linki</a></p>
    </footer>
</body>

</html>