<?php

header("Location: http://homework.local/test31/test3.1.php ");


$path = __DIR__ . "/data.txt";
$date = new DateTimeImmutable();
$checkName = $_POST["newNameInList"] ?? '';
if (preg_match('/^[а-яё]+$/iu', $checkName) && file_exists($path)) {
    file_put_contents($path, "{$checkName} {$date->format('Y-m-d H:i:s')} \n", FILE_APPEND | LOCK_EX);
}