<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Все заявки</title>
</head>
<body>
    <h2>Все сохранённые заявки:</h2>
    <table border="1" cellpadding="5">
        <tr>
            <th>Дата и время</th>
            <th>Имя</th>
            <th>Email</th>
        </tr>
        <?php
        if (file_exists("data.txt")) {
            $lines = file("data.txt", FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
            foreach ($lines as $line) {
                // Разбиваем строку по точке с запятой
                list($datetime, $name, $email) = explode(";", $line);
                echo "<tr>";
                echo "<td>" . htmlspecialchars($datetime) . "</td>";
                echo "<td>" . htmlspecialchars($name) . "</td>";
                echo "<td>" . htmlspecialchars($email) . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='3'>Данных пока нет.</td></tr>";
        }
        ?>
    </table>
    <br>
    <a href="index.php">На главную</a>
</body>
</html>