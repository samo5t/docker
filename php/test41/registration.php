
<?php
$_POST['register'] = 1;
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
<form action="/test41/mainpage.php" method="post">
    Login: <input type="text" name="register_username">
    Pass: <input type="password" name="register_password"><br>
<br>

    <button type="submit" name="send" value="send">Registration</button>
</body>
</html>