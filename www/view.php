<!DOCTYPE html><html lang="ru"><head>
    <meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Все заявки</title>
    <style>
        :root { --primary-color: #6366F1; --background-color: #F3F4F6; --form-background: #FFFFFF; --text-color: #1F2937; --border-radius: 8px; --box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -2px rgba(0, 0, 0, 0.1); --font-family: 'Inter', sans-serif; }
        body { font-family: var(--font-family); background-color: var(--background-color); color: var(--text-color); margin: 0; padding: 20px; }
        .page-content { background-color: var(--form-background); padding: 40px; border-radius: var(--border-radius); box-shadow: var(--box-shadow); width: 100%; max-width: 900px; margin: 20px auto; }
        h2 { color: #111827; border-bottom: 2px solid var(--primary-color); padding-bottom: 10px; margin-top: 0; }
        a { color: var(--primary-color); }
        table { width: 100%; border-collapse: collapse; margin-top: 20px;}
        th, td { padding: 12px 15px; border: 1px solid #ddd; text-align: left; }
        th { background-color: #F3F4F6; font-weight: 700; }
        tr:nth-of-type(even) { background-color: #F9FAFB; }
    </style>
</head><body>
<div class="page-content">
    <h2>Все сохранённые данные:</h2>
    <table>
        <thead><tr><th>Имя</th><th>Email</th></tr></thead>
        <tbody>
        <?php
        if(file_exists("data.txt")){
            $lines = file("data.txt", FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
            foreach(array_reverse($lines) as $line){
                list($name, $email) = explode(";", $line);
                echo "<tr>";
                echo "<td>" . htmlspecialchars($name) . "</td>";
                echo "<td>" . htmlspecialchars($email) . "</td>";
                echo "</tr>";
            }
        } else { echo '<tr><td colspan="2">Данных пока нет.</td></tr>'; }
        ?>
        </tbody>
    </table>
    <p><a href="index.php">← На главную</a></p>
</div>
</body></html>