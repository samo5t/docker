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

if (isset($_FILES["picture"])) {
    if (0 == $_FILES["picture"]["error"]) {
        move_uploaded_file($_FILES["picture"]["tmp_name"],
            __DIR__ . '/test.png');
        $path = 'test.png';
        $img = "<img src='{$path}'  width='800' height='610' >";
        echo $path;
        echo $img;
    }
} else {
    echo 'ошибка файла';

}

?>
</body>
</html>
