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
<form action="/test31/send.php" method="post">


    <?php

    $path = __DIR__ . "/data.txt";


    function bookOfGuests($dir): bool|array
    {if (!file_exists($dir)){
        throw new Exception('ошибка чтения');}
    else
    {
        return file($dir);
        }
    }

    try{
        foreach (bookOfGuests($path) as $value) {
            echo "{$value} <br>";
        }
    }
    catch (Exception $e){
        echo $e->getMessage();

    }
    ?>
    <button type="submit" name="send" value="send">Добавить</button>
    <br>
</form>
</body>
</html>