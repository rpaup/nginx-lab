<?php
session_start();
$username = htmlspecialchars($_POST['playerName'] ?? ''); // Используем правильный ключ
$email = htmlspecialchars($_POST['email'] ?? '');
$_SESSION['username'] = $username;
$_SESSION['email'] = $email;
$line = $username . ";" . $email . "\n";
file_put_contents("data.txt", $line, FILE_APPEND | LOCK_EX); // LOCK_EX - лучшая практика
header("Location: index.php");
exit();