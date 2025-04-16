<?php

// Проверяем метод запроса
$method = $_SERVER['REQUEST_METHOD'];
if ($method !== 'POST') {
    http_response_code(405);
    echo 'Method not allowed.';
    exit();
}

$data = json_decode(file_get_contents('php://input'), true);

$requiredFields = ['id', 'title', 'subtitle', 'content', 'user_id', 'posted_at'];
foreach ($requiredFields as $field) {
    if (!isset($data[$field]) || empty($data[$field])) {
        http_response_code(400); // Код ошибки 400 Bad Request
        echo json_encode(['error' => "Поле '$field' обязательно"]);
        exit();
    }
}

// Сохранение изображения

if (isset($data["image"]) && !empty($data["image"])) {
    $targetDir = __DIR__ . '/images/';
    $fileName = basename($data['image']);
    $targetFilePath = $targetDir . $fileName;
}

// Данные
$id = $data['id'];
$title  = $data['title'];
$subtitle = $data['subtitle'];
$content = $data['content'];
$user_id = $data['user_id'];
$posted_at = $data['posted_at'];
//Запрос
try {
    $pdo = new PDO("mysql:host=localhost;dbname=blog", "root", "");

    // SQL-запрос для вставки данных
    $sql = "INSERT INTO post (id, title, subtitle, content, user_id, posted_at) VALUES ($id, $title, $subtitle, $content, $user_id, $posted_at)";
    $affectedRowsNumber = $conn->exec($sql);
    echo "В таблицу post добавлено строк: $affectedRowsNumber";
} catch (PDOException $e) {
    echo "Ошибка подключения к базе данных: " . $e->getMessage();
}
