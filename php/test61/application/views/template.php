<?php
/** @var array $x*/
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

    echo $page->getTitle() . ' ' . $page->getTime();
    ?>
</T></b>
<p class="blocktext">
<?php

foreach ($page->getData() as $line)
{
    echo $line . '<br>';
}

?>
</p>
</body>
</html>