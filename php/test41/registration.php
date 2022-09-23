

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
</head>
<body>
<form action="/test41/mainpage.php?idAction=registration" method="post">
    <div class="center"> Login: <input class="label" type="text" name="register_username">
    Pass: <input class="label" type="password" name="register_password">
<br>
        <button class = 'button' type="submit" name="registrationButton" value="send">Registration</button>
</body>
</html>