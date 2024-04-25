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

var_dump($_FILES);
if(isset($_FILES['image'])) {
    // Проверка типа файла
    $allowedTypes = array('jpg', 'jpeg', 'png', 'gif');
    $filename = $_FILES['image']['name'];
    $filetype = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
    if (!in_array($filetype, $allowedTypes)) {
        echo "Только JPG, JPEG, PNG & GIF файлы разрешены.";
        exit();
    }

    // Папка, куда будет загружено изображение
    $targetDir = "uploads/";

    // Полный путь к загружаемому файлу
    $targetFile = $targetDir . basename($filename);

    // Перемещаем файл из временной папки загрузки в папку uploads
    move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile);
        // Файл успешно загружен
        // Теперь можно сохранить путь к файлу в базу данных
    $sql = "INSERT INTO request (cabinet, description, name, phone, time, photo) 
            VALUES ('$cabinet', '$textarea', '$name', '$phone', '$current_time','$filename')";
        if($conn->query($sql) === TRUE) {
            echo "Изображение успешно загружено и сохранено в базе данных.";
        } else {
            echo "Ошибка при сохранении в базу данных: " . $conn->error;
        }
    } else {
        echo "Ошибка при загрузке файла.";
    }
} else {
    // Файл не был отправлен
    // Это может быть необходимо только для отладки
    // echo "Файл не был отправлен.";
}

// Закрытие соединения с базой данных
$conn->close();
?>
