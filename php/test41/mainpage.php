<?php
include __DIR__ . '/mainpageAction.php';
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        .center {
            display: flex;
            justify-content: center;
        }

        .button {
            background-color: #e7e7e7;
            color: black;
            border: 2px solid #4CAF50;
            padding: 15px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            border-radius: 8px;
        }


    </style>
</head>
<body>
<form action="/test41/redirect.php" method="post">
    <b><div class = "center"><button class="button" type="submit" name="register" value="register">Регистрация</button>
            <button class="button" type="submit" name="login" value="login">Войти или сменить аккаунт</button>
            <br></div>
</form>
</body>
</html>

