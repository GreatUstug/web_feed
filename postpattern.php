<!DOCTYPE html>

<html lang="ru">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="css/post.css">
    </head>
    <body>
        <div class="post">
            <img src=<?=$data['userimageid']?> alt="user_image" class="post__user__image"> 
            <p class="post__username"><?=$data['username']?></p>
            <img src=<?=$data['postimageid']?> alt="post_image" class="post__image">
            <img src="images/reaction.png" alt="reaction" class="post__reaction">
            <p class="post__comment"><?=$data['description']?></p>
            <p class="comment__expansion">ещё</p>
            <p class="post__time"><?=$data['uploadtime']?></p>
            <br>
        </div>    
    </body>
</html>