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
//var_dump($this->data);
        $id = $post->getData()[0]['title'];
        $linkToPost = "http://homework.local/test81/postnews.php?id=$id";
        echo '<a href=' . $linkToPost . '>';
echo $post->getData()[0]['title'];
echo '</a>';
        //        $s = $page->getData();
        echo $post->getData()[0]['text'];

//        ?>

</T>
</b>

<div>
    <p class="blocktext">
<!--    --><?php
//
//    foreach ($s as $key => $value) {
//        if ($key <= 4 and $key != 0)
//            echo $value . '<br>';
//
//    }
//    echo '...'
    ?></div>
</p>
</body>
</html>