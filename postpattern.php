<!DOCTYPE html>
<?php
    $json = file_get_contents('posts.json');
    $data = json_decode($json, true);
?>
<html lang="ru">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="css/post.css">
        <title>Пост</title>
    </head>
    <body>
        <div class="post">
            <img src=<?=$data['userimageid']?> alt="user_image" class="post__user__image"> 
            <p class="post__username"><?=$data['username']?></p>
            <img src=<?=$data['postimageid']?> alt="post_image" class="post__image">
            <br>
            <img src="images/reaction.png" alt="reaction" class="post__reaction">
            <p class="post__comment"><?=$data['description']?></p>
            <p class="comment__expansion">ещё</p>
            <p class="post__time">2 часа назад</p>
        </div>    
    </body>
</html>