function updateImageUrl(event) {
    const box = document.querySelector('#image');
    const image = URL.createObjectURL(event.target.files[0]);
    const newImage = document.createElement('img');
    box.innerHTML = '';
    newImage.src = image;
    newImage.classList.add("img-fluid");
    box.appendChild(newImage);
}
