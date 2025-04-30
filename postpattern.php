
        <br>
        <div class="post">
        <img src="images/nedurka/avatar.png" alt="avatar" class="post__user__image">
        <p class="posts__user">(Не)дурка</p>
            <p class="post__username"><?=$post['title']?></p>
            <p class="post__username"><?=$post['subtitle']?></p>
            <img src=<?=$post['im']?> alt="post_image" class="post__image">
            <img src="images/reaction.png" alt="reaction" class="post__reaction"> 
            <p class="post__comment"><?=$post['content']?></p>
            <p class="comment__expansion">ещё</p>
            <p class="post__time"><?=$post['posted_at']?></p>
        </div>
        <br>   
