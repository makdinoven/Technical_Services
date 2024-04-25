// document.addEventListener("DOMContentLoaded", function() {
//     // Получаем форму по её ID
//     var form = document.getElementById('indexForm');
//
//     // Добавляем обработчик события отправки формы
//     form.addEventListener('submit', function(event) {
//         // Отменяем стандартное поведение формы (перенаправление)
//         event.preventDefault();
//
//         // Создаем объект FormData для сериализации данных формы
//         var formData = new FormData(form);
//
//         // Создаем новый объект XMLHttpRequest
//         var xhr = new XMLHttpRequest();
//
//         // Устанавливаем метод POST и адрес серверного скрипта
//         xhr.open('POST', 'new_request.php');
//
//         // Устанавливаем обработчик события загрузки
//         xhr.onload = function() {
//             if (xhr.status === 200) {
//                 // Выводим сообщение об успешной отправке данных (если нужно)
//                 alert('Данные успешно отправлены!');
//
//                 // Очищаем поля формы (если нужно)
//                 form.reset();
//             } else {
//                 // Обрабатываем ошибку (если нужно)
//                 console.error('Ошибка при отправке данных: ' + xhr.statusText);
//             }
//         };
//
//         // Устанавливаем обработчик события ошибки
//         xhr.onerror = function() {
//             // Обрабатываем ошибку (если нужно)
//             console.error('Ошибка при отправке данных');
//         };
//
//         // Отправляем данные формы на сервер
//         xhr.send(formData);
//     });
// });