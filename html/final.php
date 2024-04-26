<?php
require "header.php";

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

$sql="SELECT * FROM completed";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    echo "<table class='table'>

<tr>
<th>ID</th>
<th>ЗАПРОС</th>
<th>ФИО</th>
<th>АУДИТОРИЯ</th>
<th>ОПИСАНИЕ</th>
<th>ВЛОЖЕНИЯ</th>
<th>ТЕЛЕФОН</th>
<th>ВРЕМЯ НАЧАЛА</th>
<th>ВРЕМЯ ЗАВЕРШЕНИЯ</th>
<th>КОМЕНТАРИЙ</th>
</tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
<td>" . $row["id_completed"] . "</td>
<td>" . $row["id_request"] . "</td>
<td>" . $row["name"] . "</td>
<td>" . $row["cabinet"] . "</td>
<td>" . $row["description"] . "</td>";
        if (!empty($row["photo"])) {
            echo "<td><a href='uploads/" . $row["photo"] . "' target='_blank'>Посмотреть изображение</a></td>";
        } else {
            echo "<td>Нет изображения</td>";
        }
        echo "<td>" . $row["phone"] . "</td>";
        echo "<td>" . $row["start_time"] . "</td>";
        echo "<td>" . $row["end_time"] . "</td>";
        echo "<td>" . $row["coment"] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}

$conn->close();
?>
<div class="buttons">
    <div class="button" onclick="location.href='admin.php'">ЗАЯВКИ</div>
    <div class="button" onclick="location.href='in_work.php'">В РАБОТЕ</div>
    <div class="button" onclick="location.href='trash.php'">КОРЗИНА</div>
</div>
