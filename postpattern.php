        <main class="container__posts">
            <div class="post">
                <div class="post__user">
                    <div class="user">
                        <img src="images/nedurka/avatar.png" alt="user__image" class="posts__user__image">
                        <span class="posts__user">(Не)дурное сообщество</span>
                    </div>
                    <img src="images/edit.png" alt="edit" class="post__edit">
                </div>
                <div>
                    <div>
                        <img src=<?=$post['im']?> alt="post__picture" class="post__picture">
                        <div class="slider-controls">
                            <div class="left__slider">
                                <button class="prev__btn">
                                    << /button>
                            </div>
                            <div class="right__slider">
                                <div class="slider__button">
                                    <span class="current-indicator"></span>
                                </div>
                                <button class="next__btn">></button>
                            </div>
                        </div>
                    </div>
                    <img src="images/reaction.png" alt="reaction" class="post__vanya__reaction">
                    <div class="post__comment__">
                        <div class="posts__user"><?=$post['title']?></div>
                        <div class="posts__user"><?=$post['subtitle']?></div>
                        <div class="post__comment"><?=$post['content']?></div>
                        <div class="post__expansion">ещё</div>
                    </div>
                    <div class="post__time"><?=$post['posted_at']?></div>
                </div>
            </div>
        </main>
