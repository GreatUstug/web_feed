document.getElementById('login__form').addEventListener('submit', function(event) {
    event.preventDefault(); // Предотвращаем отправку формы по умолчанию

    const emailInput = document.getElementById('login__input__email');
    const passwordInput = document.getElementById('login__input__pass');
    let isValid = true;

    // Проверка email с использованием регулярного выражения
    if (!validateEmail(emailInput.value)) {
        showError(emailInput);
        isValid = false;
    } else {
        hideError(emailInput);
    }

    // Простая проверка длины пароля (минимум 6 символов)
    if (passwordInput.value.length < 6) {
        showError(passwordInput);
        isValid = false;
    } else {
        hideError(passwordInput);
    }

    if (isValid) {
        alert("Данные введены верно!");
    }
});

// Функция проверки формата email
function validateEmail(email) {
    return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email); // Регулярное выражение для валидности email
}

// Показ ошибок
function showError(inputField) {
    inputField.classList.add('error'); // Подсветка красного цвета
    login__error__bar.style.display = "flex";
}

// Скрытие ошибок
function hideError(inputField) {
    inputField.classList.remove('error');
    login__error__bar.style.display = "none";
}