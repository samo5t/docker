<!DOCTYPE html>
<html lang="ru">
<head>
    <title>calc</title>
    <link rel="stylesheet" href="/style.css">
</head>
<body>
<style>
img {
    vertical-align: middle;
    }
</style>
<?php

$img = ["<img src='https://ichef.bbci.co.uk/news/640/cpsprodpb/475B/production/_98776281_gettyimages-521697453.jpg'  width='800' height='610' >",
        "<img src='https://upload.wikimedia.org/wikipedia/commons/0/0e/Felis_silvestris_silvestris.jpg' width='800' height='610'>",
        "<img src='https://naked-science.ru/wp-content/uploads/2022/03/1621053325_30-oir_mobi-p-popugai-arlekin-zhivotnie-krasivo-foto-31.jpg' width='800' height='610'>",
        "<img src='https://sakhalinzoo.ru/upload/photos/5ed9bbd0ac38e_1591327696.jpg'  width='800' height='610'>",
    ];
echo $img[$_GET["id"]];

?>
</body>

</html>