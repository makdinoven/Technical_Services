<?php

$servername = "mysql"; // Имя сервера базы данных
$username = "root"; // Имя пользователя базы данных
$password = "root"; // Пароль пользователя базы данных
$dbname = "application"; // Имя вашей базы данных

// Создание соединения с базой данных
$conn = new mysqli($servername, $username, $password, $dbname);
$conn->set_charset("utf8");
// Проверка соединения на наличие ошибок
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Получение данных из формы
    $login = $_POST['login'];
    $login_password = $_POST['password'];}
$sql = "SELECT * FROM users WHERE login='$login' AND password='$login_password'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Успешная авторизация
    $_SESSION['username'] = $username; // Сохраняем имя пользователя в сессии
    header("Location: admin.php"); // Перенаправляем на следующую страницу
    exit();
}
// Закрытие соединения с базой данных
$conn->close();
?>

<?php require "header.php";?>
<div class="heading">
    <h1>НЕВЕРНЫЙ ЛОГИН ИЛИ ПАРОЛЬ</h1>
</div>
<div class="texts info" onclick="location.href='sigin.php'">Вернуться назад</div>

