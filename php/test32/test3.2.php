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
<form action="/test32/upload.php" method="post" enctype="multipart/form-data">
<input type="file" name="picture">
    <button type="submit">Отправить</button>
<?php
$path = "/bmw";
var_dump($path);
$img = "<img src='{$path}'  width='800' height='610' >";
echo $img


?>
</form>
</body>
</html>
