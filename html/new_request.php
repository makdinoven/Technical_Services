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
    $name = $_POST['name'];
    $cabinet = $_POST['number'];
    $phone = $_POST['phone'];
    $textarea = $_POST['textarea'];
    $current_time = date('Y-m-d H:i:s');

    // SQL запрос для вставки данных в таблицу
    $sql = "INSERT INTO request ( cabinet,description,name, phone, time )
            VALUES ('$cabinet','$textarea', '$name', '$phone', '$current_time')";

    if ($conn->query($sql) === TRUE) {
        echo "Данные успешно добавлены в базу данных";
    } else {
        echo "Ошибка: " . $sql . "<br>" . $conn->error;
    }
}

// Закрытие соединения с базой данных
$conn->close();
?>