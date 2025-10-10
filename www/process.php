<?php // www/process.php
session_start();
// Просто получаем данные без валидации
$username = htmlspecialchars($_POST['username']);
$email = htmlspecialchars($_POST['email'] ?? '');
// Сохраняем в сессию
$_SESSION['username'] = $username;
$_SESSION['email'] = $email;
// Перенаправляем обратно
header("Location: index.php");
exit();