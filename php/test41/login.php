<?php
session_start();
include __DIR__ . "/../include/includeFunction.php";
include __DIR__ . "/extraFunction.php";

if(authenticate($_POST['username'], $_POST['password'])) {
    echo 'успешно';
    $_SESSION['username'] = $_POST['username'];
    $_SESSION['password'] = $_POST['password'];
} else {
    $_POST['incorrectInput'] = 1;
    echo 'неуспешно';
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form action="/test41/login.php" method="post">
    Login: <input type="text" name="username">
    Pass: <input type="password" name="password"><br>
    <button type="submit" name="send" value="send">Добавить</button>
    <br>


</form>
</body>
</html>
