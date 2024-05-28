<?php
include('config.php');
session_start();

// Kullanıcının giriş yapmış olup olmadığını kontrol et
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $experience = $_POST['experience'];
    $user_id = $_SESSION['user_id'];

    $sql = "INSERT INTO community_forum (user_id, experience) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("is", $user_id, $experience);

    if ($stmt->execute() === TRUE) {
        echo "Deneyim başarıyla paylaşıldı.";
    } else {
        echo "Hata: " . $stmt->error;
    }

    $stmt->close();
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Topluluk Forumu</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <h1>Topluluk Forumu</h1>
        <form method="post" action="">
            <textarea name="experience" rows="5" required></textarea><br>
            <input type="submit" value="Deneyimi Paylaş">
            <a href="dashboard.php" class="button">Dashboard</a>
        </form>
        <h2>Diğer Kullanıcıların Deneyimleri</h2>
        <ul>
            <?php
            $sql = "SELECT users.username, community_forum.experience FROM community_forum JOIN users ON community_forum.user_id = users.id ORDER BY community_forum.created_at DESC";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<li><strong>" . htmlspecialchars($row['username']) . ":</strong> " . htmlspecialchars($row['experience']) . "</li>";
                }
            } else {
                echo "Henüz hiç deneyim paylaşılmamış.";
            }
            ?>
        </ul>
    </div>
</body>

</html>