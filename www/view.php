<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Все сохранённые данные</title>
    <style>
        :root { --primary-color: #4F46E5; --background-color: #EEF2FF; --text-color: #111827; --border-radius: 8px; }
        body { font-family: 'Inter', sans-serif; background-color: var(--background-color); color: var(--text-color); margin: 0; padding: 20px; }
        .page-content { max-width: 1200px; margin: 20px auto; background-color: #fff; padding: 30px; border-radius: var(--border-radius); box-shadow: 0 4px 6px -1px rgba(0,0,0,0.1); }
        h2 { color: #312E81; border-bottom: 2px solid #A5B4FC; padding-bottom: 10px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; font-size: 14px; }
        th, td { padding: 12px 15px; border: 1px solid #D1D5DB; text-align: left; }
        th { background-color: #F3F4F6; color: #374151; font-weight: bold; }
        tr:nth-child(even) { background-color: #F9FAFB; }
        a { color: var(--primary-color); text-decoration: none; font-weight: bold; }
        a:hover { text-decoration: underline; }
    </style>
    <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700&display=swap" rel="stylesheet">
</head>
<body>
    <div class="page-content">
        <h2>Все сохранённые данные:</h2>
        <table>
            <thead>
                <tr>
                    <th>Дата и время</th>
                    <th>Имя</th>
                    <th>Email</th>
                    <th>Возраст</th>
                    <th>Игра</th>
                    <th>Формат</th>
                    <th>Опыт участия</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $dataFile = "data.txt";
                if (file_exists($dataFile) && filesize($dataFile) > 0) {
                    $lines = file($dataFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
                    
                    foreach (array_reverse($lines) as $line) {
                        $parts = explode(";", $line);
                        if (count($parts) === 7) {
                            list($date, $playerName, $email, $age, $game, $format, $hasExperience) = $parts;
                            echo "<tr>";
                            echo "<td>" . htmlspecialchars($date) . "</td>";
                            echo "<td>" . htmlspecialchars($playerName) . "</td>";
                            echo "<td>" . htmlspecialchars($email) . "</td>";
                            echo "<td>" . htmlspecialchars($age) . "</td>";
                            echo "<td>" . htmlspecialchars($game) . "</td>";
                            echo "<td>" . htmlspecialchars($format) . "</td>";
                            echo "<td>" . htmlspecialchars($hasExperience) . "</td>";
                            echo "</tr>";
                        }
                    } 
                } else { 
                    echo '<tr><td colspan="7" style="text-align: center;">Данных пока нет.</td></tr>';
                } // Конец if-else
                ?>
            </tbody>
        </table>
        <br>
        <a href="index.php">← На главную страницу</a>
    </div>
</body>
</html>