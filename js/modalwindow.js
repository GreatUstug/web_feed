const modal = document.getElementById("#view__window");
const home = document.getElementById("#container");
const picture = document.querySelector(".post__picture");
const closeButton = document.querySelector(".close-modal");
 

// Открытие модального окна
function openModal() {
    view__window.style.display = "flex";
    container.style.display = "none";
    window.addEventListener("keydown", handleKeyDown);``
}

function handleKeyDown(e) {
    if (e.key === "Escape") {
        closeModal();
    }
}

// Закрытие модального окна
function closeModal() {
    view__window.style.display = "none";
    container.style.display = "flex";
    window.removeEventListener("keydown", handleKeyDown);
}


// Обработчики событий
closeButton.addEventListener("click", closeModal);