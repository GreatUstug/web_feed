document.querySelectorAll('.post__comment__').forEach(post => {
    const textBlock = post.querySelector('.post__comment');
    const expandButton = post.querySelector('.post__expansion');

    function shouldShowExpandButton () {
        const linesCount = Math.ceil(textBlock.scrollHeight / textBlock.offsetHeight);
        return linesCount >= 2;
    };
   
    if (shouldShowExpandButton()) {
        expandButton.style.display = 'block';
    }

    expandButton.addEventListener('click', () => {
        if (textBlock.classList.contains('expanded')) {
            textBlock.classList.remove('expanded');
            expandButton.textContent = 'Ещё';
        } else {
            textBlock.classList.add('expanded');
            expandButton.textContent = 'Свернуть';
        }
    });
});