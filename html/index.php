<?php
require "header.php";
require "new_request.php"
?>
<div class="heading">
<h1>Заявка для технической службы</h1>
</div>

<form class="index_form" id="indexForm" action="new_request.php" name="index" method="post" enctype="multipart/form-data">
    <div class="name">
    <input required placeholder="Ваше имя..." type="text" name="name">
    </div>
    <div class="number">
    <input required placeholder="Аудитория..." type="text" name="number">
    </div>
    <div class="phone">
    <input required placeholder="Номер  телефона..." type="text" name="phone">
    </div>
    <div class="textarea">
    <input required placeholder="Что случилось?" type="text" name="textarea">
    </div>
    <div class="buttons">
        <div class="button">
            <label for="fileInput">Прикрепить фото</label>
            <input type="file" id="fileInput" name="image"></div>
    <button type="submit" class="button button-big" id="submitButton">ОТПРАВИТЬ</button>
    </div>
    <div id="fileMessage"></div>
    <div class="texts">
    <div class="info">
    <div class="text">+375 (29) 89-205-74</div>
    <div class="text">Каб. 321</div>
    </div>
    <div class="admin" onclick="location.href='sigin.php'">
        Я администратор
    </div>
    </div>
    <!-- Добавляем элемент для сообщения об успешной отправке -->
</form>
    <script>
        document.getElementById('fileInput').addEventListener('change', function() {
            var fileMessage = document.getElementById('fileMessage');
            if (this.files.length > 0) {
                fileMessage.textContent = 'Фотография успешно выбрана '
                fileMessage.style.color = 'green';
            } else {
                fileMessage.textContent = 'Вложений нет';
            }
        });
    </script>
<?php
require "footer.php";
?>