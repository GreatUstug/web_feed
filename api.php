<?php

$method = $_SERVER['REQUEST_METHOD'];
if ($method !== 'POST') {
    http_response_code(405);
    echo 'Method not allowed.';
    exit();
}

$data = json_decode(file_get_contents('php://input'), true);

if (!isset($data["title"]) || !isset($data["content"])) {
    http_response_code(400);
    echo json_encode(['message' => 'Required fields are not exists (title or content)']);
    exit();
}

$postData = [
    "id" => intval($data['id']),
    "title" => htmlspecialchars($data['title']),
    "subtitle" => htmlspecialchars($data['subtitle']),
    "content" => htmlspecialchars($data['content']),
    "user_id" => intval($data['user_id']),
    "posted_at" => htmlspecialchars($data['posted_at']),
    "im" => htmlspecialchars($data['im'])
];

try {
    $pdo = new PDO("mysql:host=localhost;dbname=blog", "root", "");
    $stmt = $pdo->prepare("INSERT INTO posts  
        (id,  title,  subtitle,  content,  user_id,  posted_at, im)
    VALUES
        (:id, :title, :subtitle, :content, :user_id, :posted_at, :im)"
    );
    $stmt->execute($postData);

    http_response_code(201);
    echo json_encode(['message' => 'Post created', 'id' => $pdo->lastInsertId()]);

} catch(PDOException $e) {
    http_response_code(500);
    echo json_encode(['message' => 'Database error', 'error' => $e -> getMessage()]);
}
?>
