<?php
session_start();
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Главная страница</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700&display=swap" rel="stylesheet">
    <style>
        :root { --primary-color: #6366F1; --primary-color-hover: #4F46E5; --background-color: #F3F4F6; --form-background: #FFFFFF; --text-color: #1F2937; --border-radius: 8px; --box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -2px rgba(0, 0, 0, 0.1); --font-family: 'Inter', sans-serif; }
        body { font-family: var(--font-family); background-color: var(--background-color); color: var(--text-color); margin: 0; display: flex; justify-content: center; align-items: center; min-height: 100vh; padding: 20px; }
        .page-content { background-color: var(--form-background); padding: 40px; border-radius: var(--border-radius); box-shadow: var(--box-shadow); width: 100%; max-width: 700px; text-align: center; }
        h2 { color: #111827; border-bottom: 2px solid var(--primary-color); padding-bottom: 10px; margin-top: 0; }
        a { color: var(--primary-color); text-decoration: none; font-weight: 500; } a:hover { text-decoration: underline; }
        .links { margin-top: 30px; display: flex; justify-content: center; gap: 20px; font-size: 1.1em; }
        .message-box { padding: 20px; border-radius: var(--border-radius); margin-bottom: 20px; text-align: left; }
        .error-box { background: #FEF2F2; border: 1px solid #FCA5A5; color: #991B1B; }
        .session-box { background: #EEF2FF; border: 1px solid #C7D2FE; }
        .message-box ul { margin: 0; padding-left: 20px; }
        .message-box p { margin-top: 0; }
        .message-box strong { font-weight: 700; }
    </style>
</head>
<body>
<div class="page-content">
    <h2>Главная страница</h2>

    <?php
    if (isset($_SESSION['errors'])):
    ?>
        <div class="message-box error-box">
            <strong>❌ Ошибка валидации:</strong>
            <ul>
                <?php foreach ($_SESSION['errors'] as $error): ?>
                    <li><?= htmlspecialchars($error) ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
        <?php unset($_SESSION['errors']);

    elseif (isset($_SESSION['username'], $_SESSION['email'])):
    ?>
        <div class="message-box session-box">
            <strong>✅ Заявка успешно отправлена!</strong>
            <p>Данные из последней сессии:</p>
            <ul>
                <li>Имя: <?= htmlspecialchars($_SESSION['username']) ?></li>
                <li>Email: <?= htmlspecialchars($_SESSION['email']) ?></li>
            </ul>
        </div>
        <?php
        unset($_SESSION['username']);
        unset($_SESSION['email']);
    else:
    ?>
        <p>Добро пожаловать! Здесь будет отображаться результат отправки формы.</p>
    <?php endif; ?>

    <div class="links">
        <a href="form.html">Заполнить новую форму</a>
        <span>|</span>
        <a href="view.php">Посмотреть все заявки</a>
    </div>
</div>
</body>
</html>