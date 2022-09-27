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
<body><R class="titletextpost">
<?php
/** @var Page $page */
$s = $page->getData();
echo $page->getData()[0] . '<br>';

foreach ($s as $key => $value) {
    if ($key != 0) {
        echo '</R><W class="blocktextpost">';
        echo $value . '<br>';
    }
}
echo '</W>';
?>

</body>
</html>