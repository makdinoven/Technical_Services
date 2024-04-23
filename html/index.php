<?php
require "header.php";
?>
<div class="heading">
<h1>Заявка для технической службы</h1>
</div>

<form class="index_form" action="request.php" name="index">
    <div class="name">
    <input placeholder="Ваше имя..." type="text" name="name">
    </div>
    <div class="number">
    <input placeholder="Аудитория..." type="text">
    </div>
    <div class="phone">
    <input placeholder="Номер  телефона..." type="text">
    </div>
    <div class="textarea">
    <input placeholder="Что случилось?" type="text">
    </div>
    <div class="buttons">
    <div class="button ">Прикрепить фото</div>
    <button type="submit" class="button button-big">ОТПРАВИТЬ</button>
    </div>
    <div class="texts">
    <div class="info">
    <div class="text">+375 (29) 89-205-74</div>
    <div class="text">Каб. 321</div>
    </div>
    <div class="admin">
        Я администратор
    </div>
    </div>
</form>
<?php
require "footer.php";
?>