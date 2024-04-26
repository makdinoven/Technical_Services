function backdata(id) {
    // Выполнение AJAX-запроса для передачи идентификатора строки на сервер
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'to_request.php');
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onload = function() {
        if (xhr.status === 200) {
            // Обработка успешного ответа от сервера (если нужно)
            console.log(xhr.responseText);
            // Перезагрузка страницы или другие действия (если нужно)
            location.reload();
        } else {
            // Обработка ошибки (если нужно)
            console.error('Ошибка при выполнении AJAX-запроса: ' + xhr.statusText);
        }
    };
    xhr.onerror = function() {
        // Обработка ошибки (если нужно)
        console.error('Ошибка при выполнении AJAX-запроса');
    };
    // Отправка идентификатора строки на сервер
    xhr.send('id=' + id);
}
