<?php
$servername = "localhost";
$username = "dbusr21360859077";
$password = "8rzTQnFGNG7v";
$dbname = "dbstorage21360859077";

// Veritabanı bağlantısı oluşturma
$conn = new mysqli($servername, $username, $password, $dbname);

// Hata raporlama seviyesini ayarlama
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Bağlantı kontrolü
if ($conn->connect_error) {
    die("Bağlantı hatası: " . $conn->connect_error);
}
