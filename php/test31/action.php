<?php

$path = __DIR__ . "/data.txt";

/**
 * Считывает строки из файлы и помещает в массив
 * @param string $dir
 * @return array|false
 */

function getBookOfGuests(string $dir): array
{
    if (!file_exists($dir)) {
        throw new Exception('ошибка чтения');
    }
    return file($dir);
}

try {
    foreach (getBookOfGuests($path) as $value) {
        echo "{$value} <br>";
    }
} catch (Exception $e) {
    echo $e->getMessage();
}

