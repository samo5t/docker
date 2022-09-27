<?php

require_once __DIR__ . '/classes/GuestBook.php';


$text = new GuestBook('../test41/1.txt');
$textArray = $text->getData();

foreach ($textArray as $elem) {
    echo $elem . '<br>';
}

$text->append('rqewrrqewq');

$textArray = $text->getData();
foreach ($textArray as $elem) {
    echo $elem . '<br>';
}
$text -> saveData();
var_dump($textArray);