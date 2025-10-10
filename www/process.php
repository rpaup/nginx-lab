<?php
session_start();
$username = htmlspecialchars($_POST['playerName'] ?? ''); 
$email = htmlspecialchars($_POST['email'] ?? '');
$_SESSION['username'] = $username;
$_SESSION['email'] = $email;
header("Location: index.php");
exit();