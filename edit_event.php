<?php
include 'config.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $event_name = $_POST['event_name'];
    $description = $_POST['description'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $location = $_POST['location'];

    $sql = "UPDATE events SET event_name=?, description=?, date=?, time=?, location=? WHERE id=?"; // Parametreli sorgu kullanımı

    // Parametreli sorguyu hazırlama
    $stmt = $conn->prepare($sql);
    // Parametreleri bağlama
    $stmt->bind_param("sssssi", $event_name, $description, $date, $time, $location, $id);
    // Sorguyu çalıştırma
    if ($stmt->execute()) {
        echo "Event updated successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $stmt->close(); // Sorguyu kapatma
} else {
    $id = $_GET['id'];
    $sql = "SELECT * FROM events WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $event = $result->fetch_assoc();
}
?>
<!DOCTYPE html>
<html lang="tr">

<head>
    <title>Edit Event</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <h2>Edit Event</h2>
    <form method="post" action="">
        <input type="hidden" name="id" value="<?php echo $event['id']; ?>">
        <label for="event_name">Event Name:</label>
        <input type="text" id="event_name" name="event_name" value="<?php echo $event['event_name']; ?>" required><br><br>

        <label for="description">Description:</label>
        <textarea id="description" name="description" required><?php echo $event['description']; ?></textarea><br><br>

        <label for="date">Date:</label>
        <input type="date" id="date" name="date" value="<?php echo $event['date']; ?>" required><br><br>

        <label for="time">Time:</label>
        <input type="time" id="time" name="time" value="<?php echo $event['time']; ?>" required><br><br>

        <label for="location">Location:</label>
        <input type="text" id="location" name="location" value="<?php echo $event['location']; ?>" required><br><br>

        <input type="submit" value="Update Event">
    </form>
</body>

</html>