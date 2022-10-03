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
    <?php
    $path = __DIR__ . "/data.txt";

    include __DIR__ . "/extraFunction.php";
    $imgpath = __DIR__ . '/upload/';
    $usersWithPasswordsDB = makeKeyValues($path);
    echo '<b><div class = "center"><button class="button" type="submit" name="register" value="register">Регистрация</button>
    <button class="button" type="submit" name="login" value="login">Войти или сменить аккаунт</button>
    <br></div>';
    /**
     * @param string $path
     * @param array $usersWithPasswordsDB
     * @return void
     * регистрация нового пользователя, запись данных, сохранение в сессии
     */
    function registrationAction(string $path, array $usersWithPasswordsDB): void
    {
        if (isset($_POST['register_username']) && isset($_POST['register_password']) &&
            makeNewUser($_POST['register_username'], $_POST['register_password'], $path, $usersWithPasswordsDB)) {
            unset($_SESSION);
            $_SESSION['username'] = $_POST['register_username'];
            outputForMembers($_SESSION['username']);
        } else {
            echo "Такой пользователь уже зарегистрирован";
        }
    }

    /**
     * @param array $usersWithPasswordsDB
     * @return void
     * Вход пользователя, проверка данных в базе, сохранение в сессии
     */
    function loginAction(array $usersWithPasswordsDB): void
    {
        if ((isset($_POST['username']) && isset($_POST['password'])) && getCheckDB($_POST['username'], $_POST['password'], $usersWithPasswordsDB)) {
            $_SESSION['username'] = $_POST['username'];
            outputForMembers($_SESSION['username']);
        } else {
            echo 'Неверный логин или пароль';
            unset($_SESSION['username']);
        }
    }

    /**
     * @return void
     * Загрузка и перемещение в хранилище изображения от авторизированного пользователя
     */
    function downloadAction(): void
    {

        $fileTmpName = $_FILES['picture']['tmp_name'];
        $name = md5_file($fileTmpName);
        $nameWithFormat = $name . get_extension($_FILES['picture']['type']);
        if (!move_uploaded_file($fileTmpName, __DIR__ . '/upload/' . $nameWithFormat)) {
            echo('При записи изображения на диск произошла ошибка.');
        } else {
            echo 'Изображение загружено';
        }
    }

    /**
     * @param string $imgpath
     * @return void
     * Вывод всех загруженных изображений из хранилища
     */
    function mainpageAction(string $imgpath): void
    {
        $files = scandir($imgpath);
        $files = array_slice($files, 2);
        foreach ($files as $file) {
            echo "<img src='upload/{$file}'width='500' height='500 ' >";
        }
    }

    switch (true) {
        case (isset($_GET['idAction']) && ('registration' === $_GET['idAction'])) :
            registrationAction($path, $usersWithPasswordsDB);
            mainpageAction($imgpath);
            break;
        case (isset($_GET['idAction']) && 'login' === ($_GET['idAction'])):
            loginAction($usersWithPasswordsDB);
            mainpageAction($imgpath);
            break;
        case (isset($_GET['idAction']) && ($_GET['idAction'] === 'send')):
            downloadAction();
            mainpageAction($imgpath);
            break;
        case (isset($_SESSION['username'])):
            outputForMembers($_SESSION['username']);
            mainpageAction($imgpath);
            break;
        default:
            mainpageAction($imgpath);
    }

    unset($_SESSION);
    unset($_GET);
    ?>
</form>
</body>
</html>

