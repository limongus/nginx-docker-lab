<?php
// 1. Стартуем сессию.
session_start();

// 2. Получаем данные из формы. 

$fullName = htmlspecialchars($_POST['full_name']);
$email = htmlspecialchars($_POST['email'] ?? ''); //защита от вставки вредоносного HTML-кода.

// 3. Сохраняем полученные данные в сессию
$_SESSION['form_data'] = [
    'name' => $fullName,
    'email' => $email
];

// 4. Перенаправляем пользователя на главную страницу
header("Location: index.php");
exit(); // Завершаем выполнение скрипта после перенаправления