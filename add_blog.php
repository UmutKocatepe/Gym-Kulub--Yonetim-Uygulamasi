<?php
include('config.php');
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $content = $_POST['content'];

    $sql = "INSERT INTO blogs (title, content) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $title, $content);

    if ($stmt->execute() === TRUE) {
        echo "Blog başarıyla eklendi.";
    } else {
        echo "Hata: " . $stmt->error;
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
    <title>Blog Ekle</title>
    <style>
        /* Başlık için kalın font */
        input[type="text"] {
            font-weight: bold;
        }

        /* Metin alanı için güzel paragraf fontu */
        textarea {
            font-family: Arial, sans-serif;
            font-size: 16px;
            line-height: 1.6;
            border: 1px solid #ccc;
            border-radius: 4px;
            padding: 8px;
            width: 100%;
            box-sizing: border-box;
            margin-top: 8px;
            resize: vertical;
        }
    </style>

    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <h1>Blog Ekle</h1>
        <form method="post" action="">
            Başlık: <input type="text" name="title" required><br>
            İçerik: <textarea name="content" rows="10" required></textarea><br>
            <input type="submit" value="Blog Ekle">
            <a href="admin_dashboard.php" class="button">Dashboard</a>
        </form>
    </div>
</body>

</html>