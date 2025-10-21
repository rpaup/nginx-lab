<?php
session_start();
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Главная страница</title>
    <style>
        :root { --primary-color: #4F46E5; --background-color: #EEF2FF; --text-color: #111827; --border-radius: 8px; }
        body { font-family: 'Inter', sans-serif; background-color: var(--background-color); color: var(--text-color); margin: 0; padding: 20px; }
        .page-content { max-width: 900px; margin: 20px auto; background-color: #fff; padding: 30px; border-radius: var(--border-radius); box-shadow: 0 4px 6px -1px rgba(0,0,0,0.1); }
        h2, h3 { color: #312E81; border-bottom: 2px solid #A5B4FC; padding-bottom: 10px; }
        .error-box { color: #991B1B; background-color: #FEE2E2; border: 1px solid #FCA5A5; padding: 15px; border-radius: var(--border-radius); }
        .session-box { color: #064E3B; background-color: #D1FAE5; border: 1px solid #6EE7B7; padding: 15px; border-radius: var(--border-radius); }
        pre { background-color:#f0f0f0; padding:10px; border-radius:5px; white-space: pre-wrap; word-break: break-all; }
    </style>
     <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700&display=swap" rel="stylesheet">
</head>
<body>
<div class="page-content">
    <h2>Главная страница</h2>
    <?php if (isset($_SESSION['errors'])): ?>
        <div class="error-box">
            <p><b>Произошли ошибки:</b></p>
            <ul>
                <?php foreach ($_SESSION['errors'] as $error): ?>
                    <li><?= htmlspecialchars($error) ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
        <?php unset($_SESSION['errors']); ?>
    <?php endif; ?>
    <?php if (isset($_SESSION['success_data'])): ?>
        <div class="session-box"><p>✅ Данные последней заявки успешно сохранены!</p></div>
        <?php unset($_SESSION['success_data']); ?>
    <?php endif; ?>

    <?php if (!empty($_SESSION['api_data'])): ?>
    <div class="api-results">
        <h3>Популярные игры (RAWG API):</h3>
        <ul>
            <?php foreach ($_SESSION['api_data'] as $game): ?>
                <li><?= htmlspecialchars($game['name']) ?> (Рейтинг: <?= $game['rating'] ?>)</li>
            <?php endforeach; ?>
        </ul>
    </div>
    <?php unset($_SESSION['api_data']); // Очищаем, чтобы не показывать снова при обновлении ?>
<?php endif; ?>

    <hr style="margin: 30px 0;">

    <a href="form.html">Заполнить форму регистрации</a> |
    <a href="view.php">Посмотреть все заявки</a>
</div>
</body>
</html>