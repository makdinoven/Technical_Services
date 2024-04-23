<?php

$conn=mysqli_connect("mysql","root","root", "application");

if(!$conn){
    echo "Connection error";
} else{
    echo "Connected successfully";
}

?>

<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
</head>
<body>
<header>
    <div class="header_container">
        <div class="bsu_logo">
            <img src="img/bsu.png">
        </div>
        <div class="him_logo">
            <img src="img/bsu.png">
        </div>
    </div>
</header>

