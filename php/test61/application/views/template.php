<?php /** @var Page $page */

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="application/views/style.css" rel="stylesheet" type="text/css">
    <title>Document</title>
</head>
<body>
<T class="titletext"><b>
        <?php
        $id = $page->getPath();
        $linkToPost = "http://homework.local/test61/postnews.php?id=$id";
        echo '<a href=' . $linkToPost . '>';
        $s = $page->getData();
        echo $page->getData()[0];
        echo '</a>';
        ?>

</T>
</b>
<time class="date"><?php
    echo $page->getTime();
    ?></time>
<div>
    <p class="blocktext">
    <?php

    foreach ($s as $key => $value) {
        if ($key <= 4 and $key != 0)
            echo $value . '<br>';

    }
    echo '...'
    ?></div>
</p>
</body>
</html>