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
    echo 'ошибка файла';}