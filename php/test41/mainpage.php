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
<form action="/test41/redirect.php" method="post">

    <button type="submit" name="register" value="register">Регистрация</button>
    <button type="submit" name="login" value="login">Войти</button>
    <br>
    <?php

    $username = $_POST['username'];
    $password = $_POST['password'];
    $path = __DIR__ . "/data.txt";
    include __DIR__ . "/extraFunction.php";
var_dump($_POST);

    ?>

</form>
</body>
</html>