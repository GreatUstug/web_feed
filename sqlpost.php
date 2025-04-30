<?php
try {
    $pdo = new PDO("mysql:host=localhost;dbname=blog", "root", "");

    $sql = "SELECT * FROM posts";
    $stmt = $pdo->prepare($sql); // подготовка запроса
    $stmt->execute(); // выполнение запроса


    // Получаем массив результатов
    $posts = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Возвращаем список постов в виде JSON
header('Content-Type: application/json');
//$Json = file_get_contents('json/posts.json');
//$Data = json_decode($Json, true);
//$Id = $_GET['id'];
// $posts = $Data[1];

// foreach ($posts as $Data) {
//     require("postpattern.php");
// }



}catch(PDOException $e){
    echo json_encode(['error' => $e -> getMessage()]); 
}
?>
<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="css/post.css">
    </head> 
    <body>
         <?php
        if ($posts) {
            foreach ($posts as $post) {
                require "postpattern.php";
            }
        } else {
            echo 'Нет опубликованных записей.';
        }        
        ?> 
    </body>
</html>