<!DOCTYPE html>
<?php
    $json = file_get_contents('profile.json');
    $data = json_decode($json, true);
?>
<html lang="ru">
    <head>
        <link rel="stylesheet" href="css/index.css">
        <meta charset="utf-8">
        <title>Моя страничка. ШАБЛОН</title>
    </head>
    <body>
        <!-- <img src="images/home.png" alt="icon_home" class="side__bar__side__icons">
        <img src="images/user.png" alt="icon_user" class="side__bar__side__icons">
        <img src="images/plus.png" alt="icon_plus" class="side__bar__side__icons"> -->
        <img src=<?=$data['avatar']?> alt="avatar" class="avatar">
        <h1 class="nickname"><?=$data['nickname']?></h1>
        <p class="aboutme"><?=$data['aboutme']?></p>
        <p class="posts">43 поста</p>
        <div class="images">
            <img src=<?=$data['image1']?> alt="image_from_user" class="images__image">
            <img src=<?=$data['image2']?> alt="image_from_user" class="images__image">
            <img src=<?=$data['image3']?> alt="image_from_user" class="images__image">
            <img src=<?=$data['image4']?> alt="image_from_user" class="images__image">
            <img src=<?=$data['image5']?> alt="image_from_user" class="images__image">
            <img src=<?=$data['image6']?> alt="image_from_user" class="images__image">
            <img src=<?=$data['image7']?> alt="image_from_user" class="images__image">
            <img src=<?=$data['image8']?> alt="image_from_user" class="images__image">
            <img src=<?=$data['image9']?> alt="image_from_user" class="images__image">
        </div>    
     </body>
</html>