<?php
// Запускаем сессию в самом начале
session_start();
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Банк - Главная страница</title>
    <!-- Добавляем стили для красивого и единообразного вида -->
    <style>
        :root { --primary-color: #059669; --primary-color-hover: #047857; --background-color: #F0FDF4; --form-background: #FFFFFF; --text-color: #111827; --label-color: #374151; --border-color: #D1D5DB; --border-focus-color: var(--primary-color); --border-radius: 8px; --box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -2px rgba(0, 0, 0, 0.1); --font-family: 'Inter', sans-serif; }
        body { font-family: var(--font-family); background-color: var(--background-color); color: var(--text-color); margin: 0; padding: 20px; }
        .page-content { max-width: 900px; margin: 20px auto; background-color: #fff; padding: 30px; border-radius: var(--border-radius); box-shadow: var(--box-shadow); }
        h2, h3 { color: #064E3B; border-bottom: 2px solid #6EE7B7; padding-bottom: 10px; }
        .error-box { color: #991B1B; background-color: #FEE2E2; border: 1px solid #FCA5A5; padding: 15px; border-radius: var(--border-radius); }
        .session-box { color: #064E3B; background-color: #ECFDF5; border: 1px solid #6EE7B7; padding: 15px; border-radius: var(--border-radius); }
        .api-results { margin-top: 20px; padding: 20px; background-color: #F9FAFB; border-radius: var(--border-radius); border: 1px solid var(--border-color); }
        a { color: var(--primary-color); text-decoration: none; font-weight: bold; }
        a:hover { text-decoration: underline; }
    </style>
     <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700&display=swap" rel="stylesheet">
</head>
<body>
<div class="page-content">
    <h2>Личный кабинет</h2>

    <!-- БЛОК 1: Вывод ошибок или сообщения об успехе -->
    <?php if (isset($_SESSION['errors'])): ?>
        <div class="error-box">
            <p><b>При отправке заявки произошли ошибки:</b></p>
            <ul>
                <?php foreach ($_SESSION['errors'] as $error): ?>
                    <li><?= htmlspecialchars($error) ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
        <?php unset($_SESSION['errors']); ?>
    <?php endif; ?>

    <?php if (isset($_SESSION['success_data'])): ?>
        <div class="session-box">
            <p>✅ Заявка от <b><?= htmlspecialchars($_SESSION['success_data']['fullName']) ?></b> успешно принята на рассмотрение!</p>
        </div>
        <?php unset($_SESSION['success_data']); ?>
    <?php endif; ?>

    <!-- БЛОК 2: Вывод данных из API (из Шага 4) -->
    <?php if (!empty($_SESSION['api_data'])):
        $valutes = $_SESSION['api_data']; ?>
        <div class="api-results">
            <h3>Актуальные курсы валют (ЦБ РФ):</h3>
            <p>
                <b>USD:</b> <?= round($valutes['USD']['Value'], 2) ?? 'Н/Д' ?> ₽ | 
                <b>EUR:</b> <?= round($valutes['EUR']['Value'], 2) ?? 'Н/Д' ?> ₽ | 
                <b>CNY:</b> <?= round($valutes['CNY']['Value'], 2) ?? 'Н/Д' ?> ₽
            </p>
        </div>
    <?php unset($_SESSION['api_data']); endif; ?>

    <hr style="margin: 30px 0;">

    <!-- БЛОК 3: Навигация -->
    <a href="form.html">Подать новую заявку на кредит</a> |
    <a href="view.php">Просмотреть все заявки</a>
</div>
</body>
</html>