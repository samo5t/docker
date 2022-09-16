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

$path = __DIR__ . "/data.txt";

function bookOfGuests($dir)
{
    return file($dir);
}

$sprav = bookOfGuests($path);
foreach ($sprav as $value) {
    echo "{$value} <br>";
}

?>
<form action="/test31/send.php" method="post">
    новая запись: <input type="text" name="newNameInBook">
    <br>
    <button type="submit" name="send" value="send">Добавить</button>

    <?php
    $newClientLabel = $_POST["newNameInBook"];
    array_push($sprav,$newClientLabel);
    foreach ($sprav as $value) {
        echo "{$value} <br>";
    }
    ?>
</form>
</body>
</html>