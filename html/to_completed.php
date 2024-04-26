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

// Получение идентификатора строки из запроса
$id = $_POST['id'];

$comment = $_POST['comment'];

// Получение данных из текущей строки
$sql_select = "SELECT * FROM in_work WHERE id_request = $id";
$result = $conn->query($sql_select);

if ($result->num_rows > 0) {
    // Получение данных из результата запроса
    $row = $result->fetch_assoc();
    $description = $row['description'];
    $time=$row['time'];
    $name= $row['name'];
    $phone= $row['phone'];
    $photo= $row['photo'];
    $cabinet= $row['cabinet'];
    var_dump($row);
    var_dump($_POST);
    // Получение текущего времени
    $current_time = date('Y-m-d H:i:s');



    // Перемещение данных в таблицу completed с указанием времени
    $sql_move = "INSERT INTO completed (id_request, description,start_time, end_time,cabinet,name,phone,photo,coment) 
                 VALUES ('$id', '$description', '$time','$current_time', '$cabinet', '$name', '$phone', '$photo', '$comment')";

    if ($conn->query($sql_move) === TRUE) {
        // Успешное перемещение данных
        echo "Данные успешно перемещены в таблицу completed!";

        // Удаление данных из таблицы request
        $sql_delete = "DELETE FROM in_work WHERE id_request = $id";
        if ($conn->query($sql_delete) === TRUE) {
            // Успешное удаление данных
            echo "Запись успешно удалена из таблицы request!";
        } else {
            // Ошибка при удалении данных
            echo "Ошибка при удалении данных из таблицы request: " . $conn->error;
        }
    } else {
        // Ошибка при перемещении данных
        echo "Ошибка при перемещении данных: " . $conn->error;
    }
} else {
    // Строка с указанным идентификатором не найдена

    echo "Строка с указанным идентификатором не найдена!";
}

// Закрытие соединения с базой данных
$conn->close();

?>
