function movetocompleted(id) {
    // Получение текста комментария из поля ввода
    var comment = document.getElementById('comment_input_' + id).value;

    // Выполнение AJAX-запроса для передачи идентификатора строки и текста комментария на сервер
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'to_completed.php');
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
    // Отправка идентификатора строки и текста комментария на сервер
    xhr.send('id=' + id + '&comment=' + encodeURIComponent(comment));
}
