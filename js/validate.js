let uploadedFiles = []; // Массив для хранения выбранных файлов
// Имитация выбора файла через скрытый input[type="file"]
function triggerFileInput() {
    document.getElementById('file-input').click();
}

// Просмотр предварительно выбранных изображений
function previewImages() {
    const galleryContainer = document.querySelector('.gallery-container');
    galleryContainer.innerHTML = ''; // очищаем галерею
    uploadedFiles = [...document.getElementById('file-input').files];

    uploadedFiles.forEach(file => {
        const reader = new FileReader();
        reader.onload = function(event) {
            const img = document.createElement('img');
            img.src = event.target.result;
            galleryContainer.appendChild(img);
        };
        reader.readAsDataURL(file);
    });

    validatePublishButton();
}

// Проверка доступности кнопки "Опубликовать"
function validatePublishButton() {
    const publishBtn = document.getElementById('publish-btn');
    const captionTextArea = document.getElementById('post-caption');
    const hasImages = uploadedFiles.length > 0;
    const hasCaption = captionTextArea.value.trim() !== "";

    if(hasImages && hasCaption) {
        publishBtn.removeAttribute('disabled');
    } else {
        publishBtn.setAttribute('disabled', '');
    }
}

// Подготовка формы к отправке
document.getElementById('post-form').addEventListener('submit', function(event) {
    event.preventDefault(); // предотвращаем перезагрузку страницы

    const caption = document.getElementById('post-caption').value;
    const photos = uploadedFiles.map(file => file.name);

    console.log('Форматированный объект отправки:');
    console.log('Текст:', caption);
    console.log('Фотографии:', photos.join(', '));

    // Здесь можно реализовать отправку на сервер
});