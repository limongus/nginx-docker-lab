<?php
// 1. Стартуем сессию.
session_start();

// 2. Получаем данные из формы. 

$fullName = htmlspecialchars($_POST['full_name']);
$email = htmlspecialchars($_POST['email'] ?? ''); //защита от вставки вредоносного HTML-кода.

//Validation
$errors = [];
if (empty(trim($fullName))) {
    $errors[] = "Имя не может быть пустым.";
}
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = "Указан некорректный email адрес.";
}

// Если есть ошибки, сохраняем их в сессию и возвращаем на главную
if (!empty($errors)) {
    $_SESSION['errors'] = $errors;
    header("Location: index.php");
    exit();
}

// 3. Сохраняем полученные данные в сессию
$_SESSION['form_data'] = [
    'name' => $fullName,
    'email' => $email
];

// Собираем все данные формы в одну строку, разделяя их точкой с запятой
$line = date("Y-m-d H:i:s") . ";" . $fullName . ";" . $email . "\n";

// Дописываем строку в конец файла data.txt
file_put_contents("data.txt", $line, FILE_APPEND);

// 4. Перенаправляем пользователя на главную страницу
header("Location: index.php");
exit(); // Завершаем выполнение скрипта после перенаправления