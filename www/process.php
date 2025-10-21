<?php

session_start();
$errors = [];
$username = trim($_POST['playerName'] ?? '');
$email = trim($_POST['email'] ?? '');

if (empty($username)) { $errors[] = "Имя не может быть пустым"; }
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) { $errors[] = "Некорректный формат email"; }
if (!empty($errors)) {
    $_SESSION['errors'] = $errors;
    header("Location: index.php"); 
    exit();
}

$date = date('Y-m-d H:i:s');
$age = $_POST['age'] ?? '';
$game = $_POST['game'] ?? '';
$format = $_POST['format'] ?? '';
$hasExperience = isset($_POST['hasExperience']) ? 'Да' : 'Нет';

$_SESSION['success_data'] = [
    'playerName' => $username,
    'email' => $email
];

$line = implode(";", [
    $date,
    $username,
    $email,
    $age,
    $game,
    $format,
    $hasExperience
]) . "\n";

file_put_contents("data.txt", $line, FILE_APPEND);

require_once 'ApiClient.php';
$api = new ApiClient();
$apiKey = '0b7ca27ea9b94e43869b9bbe2300ea9d';
$url = "https://api.rawg.io/api/games?key={$apiKey}&ordering=-rating&page_size=5";
$apiData = $api->request($url);
$_SESSION['api_data'] = $apiData['results'] ?? [];

setcookie("last_submission", date('Y-m-d H:i:s'), time() + 3600, "/");
header("Location: index.php"); 
exit();