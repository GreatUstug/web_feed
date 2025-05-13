const photosContainer = document.querySelector(".photos-container");
const addPhotoButton = document.querySelector(".add-photo-button");
const addPhotoLink = document.querySelector(".add-photo-link");
const textarea = document.querySelector("textarea");
const shareButton = document.querySelector(".share-button");

const MAX_IMAGE_WIDTH = 200;
const MAX_IMAGE_HEIGHT = 180;

let uploadedPhotos = [];

function openFileDialog() {
    const fileInput = document.createElement("input");
    fileInput.type = "file";
    fileInput.accept = "image/*";
    fileInput.multiple = true;
    fileInput.onchange = handleFileUpload;
    fileInput.click();
}

function handleFileUpload(event) {
    const files = event.target.files || [];
    if (files.length > 0) {
        uploadImages(Array.from(files));
    }
}

function uploadImages(fileList) {
    fileList.forEach(file => {
        const reader = new FileReader();
        reader.onload = function (e) {
            createThumbnail(e.target.result);
        };
        reader.readAsDataURL(file);
    });
}

function createThumbnail(src) {
    const img = new Image();
    img.src = src;
    img.className = "photo-item";
    img.style.width = "auto";
    img.style.height = "auto";
    img.style.maxWidth = `${MAX_IMAGE_WIDTH}px`;
    img.style.maxHeight = `${MAX_IMAGE_HEIGHT}px`;
    photosContainer.appendChild(img);
    uploadedPhotos.push(src);
    checkPostConditions();
}

function checkPostConditions() {
    const canPublish =
        uploadedPhotos.length > 0 &&
        textarea.value.trim() !== "";

    shareButton.disabled = !canPublish;
}

function exportPostInfo() {
    const postData = {
        text: textarea.value.trim(),
        images: uploadedPhotos.slice()
    };
    console.log(postData);
}

addPhotoButton.addEventListener("click", openFileDialog);
addPhotoLink.addEventListener("click", openFileDialog);
textarea.addEventListener("input", checkPostConditions);
shareButton.addEventListener("click", exportPostInfo);