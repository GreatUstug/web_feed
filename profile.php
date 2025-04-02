<!DOCTYPE html>
<?php

    require_once('validation.php');

    $Json = file_get_contents('json/profile.json');
    $Data = json_decode($Json, true);

    $Id = isset($_GET['id']) ? $_GET['id'] : null;
    if ($Id === null){
        header("Location: home.php");
        exit;
        }
    
    if (!is_numeric($Id)) {
        header("Location: home.php");
        exit;
        }        
        

    if (!array_key_exists($Id, $Data)) {
        header("Location: home.php");
        exit;
        }
    
    // foreach ($data[$id] as $key) {
    //     validateLength($key);
    //     if (validateType($key, "array"))
    // }
    $Id = $_GET['id'];
    $user = $Data[$Id];    
?>
<html lang="ru">
    <head>
        <link rel="stylesheet" href="css/index.css">
        <meta charset="utf-8">
        <title>Моя страничка. ШАБЛОН</title>
    </head>
    <body>
        <img src=<?= $user['avatar']; ?> alt="avatar" class="avatar">
        <h1 class="nickname"><?php echo htmlspecialchars($user['name']); ?></h1>
        <p class="aboutme"><?php echo htmlspecialchars($user['aboutme']); ?></p>
        <p class="posts">43 поста</p>
        <div class="images">
        <?php foreach($user['images'] as $Image){    
            echo "<img src=" . $Image .' '.'alt="image_from_user" class="images__image">';
         }?>
        </div>
     </body>
</html>