<?php

session_start();

require 'db.php';
require 'Player.php';
require_once 'ApiClient.php'; 

$errors = [];
$name = trim($_POST['playerName'] ?? '');
$email = trim($_POST['email'] ?? '');

if (empty($name)) { $errors[] = "Имя не может быть пустым"; }
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) { $errors[] = "Некорректный формат email"; }

if (!empty($errors)) {
    $_SESSION['errors'] = $errors;
    header("Location: index.php"); 
    exit();
}


$age = intval($_POST['age'] ?? 0);
$game = $_POST['game'] ?? '';
$format = $_POST['format'] ?? '';
$experience = isset($_POST['hasExperience']) ? 1 : 0; 

try {
    $Player = new Player($pdo);
    $Player->add($name, $email, $age, $game, $format, $experience);
    $_SESSION['success_data'] = ['playerName' => $name, 'email' => $email]; 
    
} catch (\PDOException $e) {
    $_SESSION['errors'][] = "Ошибка сохранения в БД: " . $e->getMessage();
    header("Location: index.php"); 
    exit();
}


$api = new ApiClient();
$apiKey = '0b7ca27ea9b94e43869b9bbe2300ea9d'; // 
$url = "https://api.rawg.io/api/games?key={$apiKey}&ordering=-rating&page_size=5";
$apiData = $api->request($url);
$_SESSION['api_data'] = $apiData['results'] ?? [];


setcookie("last_submission", date('Y-m-d H:i:s'), time() + 3600, "/");

header("Location: index.php"); 
exit();