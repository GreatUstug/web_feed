<?php
try {
    $pdo = new PDO("mysql:host=localhost;dbname=blog", "root", "");

    $sql = "SELECT * FROM posts";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    $posts = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $stmt = null;
    $pdo = null;

} catch (PDOException $e) {
    die("Ошибка: " . $e->getMessage());
}
?>
<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="utf-8">
        <title>Пост блога</title>
        <link rel="stylesheet" href="css/post.css">
    </head> 
    <body>
        <?php
        if (!empty($posts)) {
            foreach ($posts as $post) {
                require "postpattern.php";
            }
        } else {
            echo '<h2>Нет опубликованных записей.</h2>';
        }
        ?>
    </body>
</html>