<?php

// Проверяем метод запроса
$method = $_SERVER['REQUEST_METHOD'];
if ($method !== 'POST') {
    http_response_code(405);
    echo 'Method not allowed.';
    exit();
}

$data = json_decode(file_get_contents('php://input'), true);

// Проверка обязательных полей
if (!isset($data["title"]) || !isset($data["content"])) {
    http_response_code(400); // Bad Request
    echo json_encode(['message' => 'Отсутствуют обязательные поля']);
    exit();
}

// Загрузка изображения (если передано)
$fileName = '';
if ($_FILES && isset($_FILES['image'])) {
    $fileName = basename($_FILES['image']['name']);
    $targetDir = __DIR__ . '/images/';
    $targetFilePath = $targetDir . $fileName;
    move_uploaded_file($_FILES["image"]["tmp_name"], $targetFilePath);
}

// Данные для записи в БД
$postData = [
    "title" => htmlspecialchars($data['title']),
    "content" => htmlspecialchars($data['content']),
    "author_id" => intval($data['author_id']),
    "category_id" => intval($data['category_id']),
    "image_path" => $fileName ? $targetFilePath : ''
];

// Соединение с базой данных
try {
    $pdo = new PDO("mysql:host=localhost;dbname=your_database", "username", "password");
    $stmt = $pdo->prepare(
        "INSERT INTO posts (title, content, author_id, category_id, image_path)
         VALUES (:title, :content, :author_id, :category_id, :image_path)"
    );
    $stmt->execute($postData);

    // Успешное создание поста
    http_response_code(201); // Created
    echo json_encode(['message' => 'Пост успешно создан', 'id' => $pdo->lastInsertId()]);

} catch(PDOException $e) {
    http_response_code(500); // Internal Server Error
    echo json_encode(['message' => 'Ошибка базы данных']);
}
?>
