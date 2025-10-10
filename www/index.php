<?php session_start(); ?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Главная страница</title>
</head>
<body>
    <h1>Добро пожаловать!</h1>

    <?php if(isset($_SESSION['form_data'])): ?>
        <div style="border: 1px solid green; padding: 10px;">
            <p>Спасибо! Ваши данные из последней заявки:</p>
            <ul>
                <li>Имя: <?= $_SESSION['form_data']['name'] ?></li>
                <li>Email: <?= $_SESSION['form_data']['email'] ?></li>
            </ul>
        </div>
        <?php 
            // Очищаем данные из сессии, чтобы они не показывались при следующей перезагрузке
            unset($_SESSION['form_data']); 
        ?>
    <?php else: ?>
        <p>Вы еще не отправляли заявку. Можете сделать это сейчас.</p>
    <?php endif; ?>

    <hr>
    <a href="form.html">Заполнить форму</a> |
    <a href="view.php">Посмотреть все данные</a>
</body>
</html>