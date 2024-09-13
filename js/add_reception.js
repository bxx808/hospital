const form = document.getElementById('add_reception');
form.addEventListener("submit", (e) => { //Сокращенная форма функции
    e.preventDefault();
    const formData = new FormData(form);
    formData.forEach((el,key) =>{
        if(el.trim().length === 0){
            alert(`${key} Должен быть заполнен`)
        }
    });
});