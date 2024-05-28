<?php
session_start();

// Oturum değişkenlerini temizleme
$_SESSION = array();

// Oturumu yok etme
session_destroy();

// Kullanıcıyı giriş sayfasına yönlendirme
header("Location: login.php");
exit();
