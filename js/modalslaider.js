const currentModal = document.querySelector(".modal__current");
const prevModal = document.querySelector(".modal__prev__btn");
const nextModal = document.querySelector(".modal__next__btn");
const slidesModal = document.querySelectorAll(".modal__picture");
let current = 0;

// Функция обновления видимости слайдов
function updateModals() {
    slidesModal.forEach((slide, idx) => {
        slide.style.display = idx === current ? 'block' : 'none';
    });
    currentModal.innerText = `${current + 1} из ${slidesModal.length}`; // Текущая и общая количество картинок
}

function NextModal() {
    current++;
    if (current > slidesModal.length - 1) {
        current = 0;
    }
    updateModals();
}

function PrevModal() {
    current--;
    if (current < 0) {
        current = slidesModal.length - 1;
    }
    updateModals();
}

nextModal.addEventListener("click", NextModal);
prevModal.addEventListener("click", PrevModal);

updateModals()