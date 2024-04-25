<?php
require "header.php";
?>

<div class="heading">
    <h1>ДОБРО ПОЖАЛОВАТЬ!</h1>
</div>
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

$sql = "SELECT * FROM request";
$result = $conn->query($sql);

// Проверяем, есть ли данные в результате запроса
if ($result->num_rows > 0) {
// Выводим заголовки таблицы
echo "<table border='1' class='table'>
    <tr>
        <th>ФИО</th>
        <th>АУДИТОРИЯ</th>
        <th>ТЕЛЕФОН</th>
        <th>ОПИСАНИЕ</th>
        <th>ВРЕМЯ</th>
        <th>ВЛОЖЕНИЯ</th>
        <th><img src='img/accept.svg'> </th>
        <th><img src='img/trash.svg'></th>
    </tr>";

    // Выводим данные из каждой строки результата запроса
    while($row = $result->fetch_assoc()) {
    echo "<tr>
        <td>".$row["name"]."</td>
        <td>".$row["cabinet"]."</td>
        <td>".$row["phone"]."</td>
        <td>".$row["description"]."</td>
        <td>".$row["time"]."</td>
        <td></td>
        <td class='accept'></td>
        <td class='trash'></td>
    </tr>";
    }

    // Закрываем таблицу
    echo "</table>";
} else {
// Если в таблице нет данных
echo "0 results";
}

// Закрытие соединения с базой данных
$conn->close();
?>
<div class="buttons">
    <div class="button">В РАБОТЕ</div>
    <div class="button">ЗАВЕРШЕННЫЕ</div>
    <div class="button">КОРЗИНА</div>
</div>
