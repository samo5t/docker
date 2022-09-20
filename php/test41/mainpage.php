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
    $path = __DIR__ . "/data.txt";
    include __DIR__ . "/../include/includeFunction.php";
    include __DIR__ . "/extraFunction.php";
    if (isset($_POST['register_username']) && isset($_POST['register_password'])) {
        $entry = "{$_POST["register_username"]},{$_POST["register_password"]} \n";
        $checkName = $_POST["register_username"];
        if (checkLabel($checkName, 4) && (authenticate($_POST['register_username'], $_POST['register_password']))) {
            file_put_contents($path, $entry, FILE_APPEND | LOCK_EX);
            $sprav = getUsersList($path);
            foreach ($sprav as $value) {
                echo "{$value} <br>";
            }
        } else {
            echo "Неверные значения или уже зарегистрированы";
        }
    };
    if (isset($_POST['username']) && isset($_POST['password'])) {
        if (authenticate($_POST['username'], $_POST['password'])) {
            echo 'успешно';
            $_SESSION['username'] = $_POST['username'];
            $_SESSION['password'] = $_POST['password'];}
        else{
                echo 'Неверный логин или пароль';
            }
        }


    ?>

</form>
</body>
</html>