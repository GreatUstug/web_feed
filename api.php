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
    echo json_encode(['message' => 'Required fields are not exists (title or content)']);
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
    "id" => intval($data['id']),
    "title" => htmlspecialchars($data['title']),
    "subtitle" => intval($data['subtitle']),
    "content" => htmlspecialchars($data['content']),
    "user_id" => intval($data['user_id']),
    "posted_at" => htmlspecialchars($data['posted_at'])
    //"image_path" => $fileName ? $targetFilePath : ''
];

// Соединение с базой данных
try {
    $pdo = new PDO("mysql:host=localhost;dbname=blog", "root", "");
    $stmt = $pdo->prepare(
        "INSERT INTO posts  (id,  title,  subtitle,  content,  user_id,  posted_at)
                          VALUES (:id, :title, :subtitle, :content, :user_id, :posted_at)"
    );
    $stmt->execute($postData);

    // Успешное создание поста
    http_response_code(201); // Created
    echo json_encode(['message' => 'Post created', 'id' => $pdo->lastInsertId()]);

} catch(PDOException $e) {
    http_response_code(500); // Internal Server Error
    echo json_encode(['message' => 'Database error', 'error' => $e -> getMessage()]);
}
?>
