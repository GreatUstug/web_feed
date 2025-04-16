<!DOCTYPE html>

<html lang="ru">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="css/post.css">
    </head>
    <body>
        <div class="post">
            <p class="post__username"><?=$data['user_id']?></p>
            <p class="post__username"><?=$data['title']?></p>
            <p class="post__username"><?=$data['subtitle']?></p>
            <img src=<?=$data['image']?> alt="post_image" class="post__image">
            <img src="images/reaction.png" alt="reaction" class="post__reaction">
            <p class="post__comment"><?=$data['content']?></p>
            <p class="comment__expansion">ещё</p>
            <p class="post__time"><?=$data['posted_at']?></p>
            <br>
        </div>    
    </body>
</html>