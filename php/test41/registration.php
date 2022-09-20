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
<?php

    include __DIR__ . "/extraFunction.php";
    $path = __DIR__ . "/data.txt";
    $entry = "{$_POST["username"]} {$_POST["password"]} \n";
    $checkName = $_POST["username"];

    if (checkLabel($checkName)) {
        file_put_contents($path, $entry, FILE_APPEND | LOCK_EX);
        $sprav = getUsersList($path);
        foreach ($sprav as $value) {
            echo "{$value} <br>";
        }
    } else {
        echo "Неверное значение";
    }
    var_dump($_POST);
?>
</body>
</html>