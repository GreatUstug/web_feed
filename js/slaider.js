const indicator = document.querySelector(".current-indicator");
const prevButton = document.querySelector(".prev__btn");
const nextButton = document.querySelector(".next__btn");
const slides = document.querySelectorAll(".post__picture");
let currentIndex = 0;

// Функция обновления видимости слайдов
function updateSlides() {
    slides.forEach((slide, idx) => {
        slide.style.display = idx === currentIndex ? 'block' : 'none';
    });
    indicator.innerText = `${currentIndex + 1}/${slides.length}`; // Текущая и общая количество картинок
}

function goNext() {
    currentIndex++;
    if (currentIndex > slides.length - 1) {
        currentIndex = 0;
    }
    updateSlides();
}

function goPrev() {
    currentIndex--;
    if (currentIndex < 0) {
        currentIndex = slides.length - 1;
    }
    updateSlides();
}

nextButton.addEventListener("click", goNext);
prevButton.addEventListener("click", goPrev);

updateSlides() 
