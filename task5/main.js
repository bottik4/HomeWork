function submitForm() {
    const name = document.getElementById('name').value;
    const email = document.getElementById('email').value;
    const age = document.getElementById('age').value;
    const specialty = document.getElementById('specialty').value;
    const experience = document.getElementById('experience').value;


    if (!name || !email || !age || !specialty || !experience) {
        document.getElementById('errorMessage').innerText = 'Все поля должны быть заполнены.';
        return;
    }


    if (age < 35) {
        document.getElementById('errorMessage').innerText = 'Возраст должен быть более 35 лет.';
        return;
    }
    if (experience < 3) {
        document.getElementById('errorMessage').innerText = 'Стаж работы должен быть более 3 лет.';
        return;
    }


    const xhr = new XMLHttpRequest();
    xhr.open('POST', 'save_data.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            document.getElementById('errorMessage').innerText = 'Данные успешно отправлены.';
        }
    };
    const data = `name=${name}&email=${email}&age=${age}&specialty=${specialty}&experience=${experience}`;
    xhr.send(data);
}