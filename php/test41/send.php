

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
    Login: <input type="text" name="username">
    Pass: <input type="password" name="password"><br>
    <button type="submit" name="send" value="send">Добавить</button>
    <br>
    <?php
    include __DIR__ . "/extraFunction.php";
    var_dump($_POST);
    if ($_POST['register'] == 'register') {
        $_POST['username'] = 'username';
        $_POST['password'] = 'password';
    }

    ?>

</form>
</body>
</html>
