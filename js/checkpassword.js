document.querySelectorAll('.login__form').addEventListener('submit', function(event) {
    event.preventDefault();

    const email = document.querySelectorAll('emailInput');
    const password = document.querySelectorAll('passwordInput');

    let valid = true;

    if (!validateEmail(email.value)) {
        addErrorStyle(email);
        valid = false;
    } else {
        removeErrorStyle(email);
    }

    if (!validatePassword(password.value)) {
        addErrorStyle(password);
        valid = false;
    } else {
        removeErrorStyle(password);
    }

    if (valid) {
        alert("Данные введены верно!");
    }
});

function validateEmail(email) {
    return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email); // Простое регулярное выражение для базовой проверки почты
}

// Проверка длины пароля
function validatePassword(password) {
    return password.length >= 4 && password.length <= 20;
}

// Добавление красного контура при ошибке
function addErrorStyle(inputField) {
    inputField.classList.add('error');
}

// Удаление красного контура при успешной проверке
function removeErrorStyle(inputField) {
    inputField.classList.remove('error');
}