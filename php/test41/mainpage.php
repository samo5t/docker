<?php
session_start();

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
    </style>
</head>
<body>
<form action="/test41/redirect.php" method="post">
    <?php
    $path = __DIR__ . "/data.txt";
    include __DIR__ . "/../include/includeFunction.php";
    include __DIR__ . "/extraFunction.php";


    echo '<b><div class = "center"><button type="submit" name="register" value="register">Регистрация</button>
    <button type="submit" name="login" value="login">Войти или сменить аккаунт</button>
    <br></div>';
    if ($_SESSION['username'] != 0) {
        echo '<button type="submit" name="download" value="pic">Загрузить</button>
            <br></div>';
    }

    if ((isset($_POST['username']) && isset($_POST['password'])) && getCheckDB($_POST['username'], $_POST['password'])){
        echo '<div class = "center">' . "<p> {$_POST['username']}, вы вошли</div>";
        $_SESSION['username'] = $_POST['username'];
//        var_dump($_SESSION);
    } else {
        echo 'Неверный логин или пароль';
        $_SESSION['username'] = 0;
        $_SESSION['id'] = 0;
    }
//    var_dump($_SESSION);
    if ((isset($_POST['register_username']) && isset($_POST['register_password'])) &&
        !getNewUser($_POST['register_username'], $_POST['register_password'], $path)) {
        echo "Неверные значения или уже зарегистрированы";
    }
    echo $_FILES['name']    ;
    $img = "<img src='{$_FILES['name']}'  width='800' height='610' >";
    var_dump($_FILES['picture']);
?>
</form>
</body>
</html>

