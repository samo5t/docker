<!DOCTYPE html>
<html lang="ru">
<head>
    <title>img</title>

</head>
<body>

<form action="/image22/send.php" method="get">
    <?php
    $img = ['https://ichef.bbci.co.uk/news/640/cpsprodpb/475B/production/_98776281_gettyimages-521697453.jpg',
        'https://upload.wikimedia.org/wikipedia/commons/0/0e/Felis_silvestris_silvestris.jpg',
        'https://naked-science.ru/wp-content/uploads/2022/03/1621053325_30-oir_mobi-p-popugai-arlekin-zhivotnie-krasivo-foto-31.jpg',
        'https://sakhalinzoo.ru/upload/photos/5ed9bbd0ac38e_1591327696.jpg'];
    foreach ($img as $id => $value) {
        echo "<a href='/image22/send.php?id={$id}&value={$value}'><img src=" . $value . " title='Перейти' width='400' height='255'>";
    }
    ?>
</form>
</body>

</html>