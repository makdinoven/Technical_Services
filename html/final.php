<?php
require "header.php";
?>
<h1 class="heading">История</h1>
<?php

$servername = "mysql";
$username = "root";
$password = "root";
$dbname = "application";
$conn = new mysqli($servername, $username, $password, $dbname);
$conn->set_charset("utf8");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$order = "DESC";
$startDate = '';
$endDate = '';
$showFrequentRooms = false;

if (isset($_POST['sort_oldest'])) {
    $order = "ASC";
} elseif (isset($_POST['sort_newest'])) {
    $order = "DESC";
} elseif (isset($_POST['frequent_rooms'])) {
    $showFrequentRooms = true;
}

if (isset($_POST['start_date']) && isset($_POST['end_date'])) {
    $startDate = $_POST['start_date'];
    $endDate = $_POST['end_date'];
}

$sql = "SELECT * FROM completed";
if ($startDate && $endDate) {
    $sql .= " WHERE start_time BETWEEN '$startDate' AND '$endDate'";
}
$sql .= " ORDER BY start_time $order";
$result = $conn->query($sql);

echo '<div class="filters_container"> <form class="filters" method="post" action="">
    <div class="form_buttons">
    <button class="oldest" type="submit" name="sort_oldest">Сортировать по старым записям</button>
    <button class="oldest" type="submit" name="sort_newest">Сортировать по новым записям</button>
    <button class="popular" type="button" onclick="toggleFrequentRooms()">Показать/Скрыть частые аудитории</button>
    </div> 
    <div class="date_filter">
    <label for="start_date">Начальная дата:</label>
    <input class="date" type="date" id="start_date" name="start_date" >
    <label for="end_date">Конечная дата:</label>
    <input class="date" type="date" id="end_date" name="end_date">
    <button class="date_filter_button" style="width: 160px;height: 40px" type="submit">Фильтровать по дате</button>
    </div>
</form>
 <div class="button button_reset" onclick="resetFilters()">Сбросить все фильтры</div></div>';


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

// Примерный HTML для скрытого блока, который будет показан/скрыт
echo '<div class="freq" id="frequentRooms" style="display: none;">';


    $sql_frequent = "SELECT cabinet, COUNT(*) as request_count FROM completed GROUP BY cabinet ORDER BY request_count DESC";
    $result_frequent = $conn->query($sql_frequent);

 echo "<h1 class='heading'>Самые частые аудитории</h1>";
    if ($result_frequent->num_rows > 0) {
        echo "<table class='table'>
        <tr>
            <th>АУДИТОРИЯ</th>
            <th>КОЛИЧЕСТВО ЗАЯВОК</th>
        </tr>";
        while ($row = $result_frequent->fetch_assoc()) {
            echo "<tr>
            <td>" . $row["cabinet"] . "</td>
            <td>" . $row["request_count"] . "</td>
            </tr>";
        }
        echo "</table>";
    } else {
        echo 'Нет данных о частых аудиториях';
    }


echo '</div>';

$conn->close();
?>

<div class="buttons">
    <div class="button" onclick="location.href='admin.php'">ЗАЯВКИ</div>
    <div class="button" onclick="location.href='in_work.php'">В РАБОТЕ</div>
    <div class="button" onclick="location.href='trash.php'">КОРЗИНА</div>
</div>


<script>
    function toggleFrequentRooms() {
        var frequentRooms = document.getElementById('frequentRooms');
        if (frequentRooms) {
            if (frequentRooms.style.display === 'none' || frequentRooms.style.display === '') {
                frequentRooms.style.display = 'block';
            } else {
                frequentRooms.style.display = 'none';
            }
        } else {
            console.error("Element with id 'frequentRooms' not found.");
        }
    }
    function resetFilters() {
        // Сбросить все установленные фильтры (если они есть)
        window.location.replace('final.php');

    }
</script>

<?php require "footer.php"; ?>
