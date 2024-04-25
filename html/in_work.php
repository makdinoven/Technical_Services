<?php
require "header.php";
?>

<div class="heading">
    <h1>ЗАЯВКИ В РАБОТЕ</h1>
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

$sql = "SELECT * FROM in_work";
$result = $conn->query($sql);

// Проверяем, есть ли данные в результате запроса
if ($result->num_rows > 0) {
// Выводим заголовки таблицы
    echo "<table border='1' class='table'>
    <tr>
        <th>ID ЗАЯВКИ</th>
        <th>ОПИСАНИЕ</th>
        <th>ФИО</th>
        <th>АУДИТОРИЯ</th>
        <th>ТЕЛЕФОН</th>
        <th>ВРЕМЯ</th>
        <th>ВЛОЖЕНИЯ</th>
        <th><img src='img/edit.svg'></th>
        <th><img src='img/accept.svg'> </th>
        
    </tr>";
    // Выводим данные из каждой строки результата запроса
    while($row = $result->fetch_assoc()) {
        echo "<tr>
        <td>" . $row['id_request'] . "</td>
        <td>" . $row["name"] . "</td>
        <td>" . $row["cabinet"] . "</td>
        <td>" . $row["phone"] . "</td>
        <td>" . $row["description"] . "</td>
        <td>" . $row["time"] . "</td>";

        // Проверяем, есть ли ссылка на изображение в столбце "photo"
        if (!empty($row["photo"])) {
            // Если есть, создаем ссылку на изображение
            echo "<td><a href='uploads/" . $row["photo"] . "' target='_blank'>Посмотреть изображение</a></td>";
        } else {
            // Если нет, выводим просто текст "Нет изображения"
            echo "<td>Нет изображения</td>";
        }
        // Добавляем поле ввода комментария
        echo "<td><input type='text' id='comment_" . $row["id_request"] . "'></td>";

        // Добавляем кнопку для перемещения в завершенные
        echo "<td class='accept'><button onclick='movetocompleted(" . $row["id_request"] . ")'>Завершить</button></td>
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
    <div class="button" onclick="location.href='admin.php'">ЗАЯВКИ</div>
    <div class="button" onclick="location.href='final.php'">ЗАВЕРШЕННЫЕ</div>
    <div class="button" onclick="location.href='trash.php'">КОРЗИНА</div>
</div>

<?php require "footer.php"; ?>

