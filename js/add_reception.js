const form = document.getElementById('add_reception');
const alertBox = document.getElementById('alert');
form.addEventListener("submit", (e) => { //Сокращенная форма функции
    e.preventDefault();//Отменяет стандартное действие (обновление)
    console.log(alertBox);
    alertBox.classList.add('d-none');
    const formData = new FormData(form);//Класс который наход автоматический каждый input
    formData.forEach((el, key) => {
        if (el.trim().length === 0) {//Выполнили проверку на наличие символов 
            alertBox.textContent = `${key} Должен быть заполнен`;//Вывели текст ошибки 
            alertBox.classList.remove('d-none');//Убрали класс d-none
            alertBox.classList.remove('alert-success');// Убрали класс alert-success
            alertBox.classList.add('alert-danger');//Добавили класс alert-danger
            return;
        }
    });
    if (formData.get('reason').trim().length < 2) {//Выполнили проверку на наличие не менее 20 символов 
        alertBox.textContent = `Не может быть меньше 20 символов`;
        alertBox.classList.remove('d-none');
        alertBox.classList.remove('alert-success');
        alertBox.classList.add('alert-danger');
        return;
    }
    fetch("handler/add_reception_handler.php", { //Отправляет запрос на указанную конечную точку(Endpoint) и получает результат
        method: 'POST',
        body: formData
    })
        .then(response => response.json())//Затем когда данные полученные мы записываем в переменную (response)
        .then(data => { //Записываем результат в data
            if (data.status === 'success') {
                alertBox.textContent = data.message;//Вывели сообщение 
                alertBox.classList.remove('d-none');
                alertBox.classList.remove('alert-danger');
                alertBox.classList.add('alert-success');
            }
            if (data.status === 'error') {
                alertBox.textContent = data.message;
                alertBox.classList.remove('d-none');
                alertBox.classList.remove('alert-success');
                alertBox.classList.add('alert-danger');
            }
            setTimeout(() => {//Добавили таймер на alert
                alertBox.classList.add('d-none');
            }, 2000);
        });
});