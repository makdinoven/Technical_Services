<?php
require "header.php";
?>
<div class="heading">
<h1>ВХОД В СИСТЕМУ</h1>
</div>
<form class="login_form" action="login.php" method="post">
    <div class="login">
        <input required placeholder="LOGIN" type="text" name="login">
    </div>
    <div class="password">
        <input required placeholder="PASSWORD" type="text" name="password">
    </div>
    <button type="submit" class="button button-login">ВОЙТИ</button>
    <div class="info text texts" style="padding-left: 50px">
        Вернуться назад
    </div>
</form>
<div id="errorMessage" style="color: red; display: none;">Неверный логин или пароль</div>
<?php
require "footer.php";
?>

