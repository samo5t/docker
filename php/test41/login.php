

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
        .label {
            background-color: white;
            color: black;
            border: 2px solid lightblue;
            padding: 15px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            border-radius: 4px;
        }
    </style>
</head>
<body>
<form action="/test41/mainpage.php?idAction=login" method="post">
    <div class="center">Login: <input class="label" required maxlength="30" pattern="^[a-z]+$" type="text" name="username">
    Pass: <input class='label' type="password" required maxlength="30" name="password"><br>

    <button class="button" type="submit" name="send" value="send">Добавить</button>
    <br>
</form>
</body>
</html>
