<?php
header("Location: http://homework.local/test31/test3.1.php ")
//?>
<!doctype html>
<html lang="en">
<body>
<form action="/test31/test3.1.php">
    <?php
    /**
     * @param string $dir
     * @return array|false
     * Считывает строки из файлы и помещает в архив
     */
    function bookOfGuests(string $dir)
    {
        return file($dir);
    }
    if (!file_exists(__DIR__ . "../include/includeFunction.php")){
    include __DIR__ . "../include/includeFunction.php";}

    $path = __DIR__ . "/data.txt";
    $entry = "{$_POST["newNameInList"]} {$_POST["arrivalTime"]} \n";
    $pattern = '/^[а-яё]+$/iu';
    $checkName = $_POST["newNameInList"];

    if ($checkName !== null && preg_match($pattern, $checkName)) {
        file_put_contents($path, $entry, FILE_APPEND | LOCK_EX);
        $sprav = bookOfGuests($path);
        foreach ($sprav as $value) {
            echo "{$value} <br>";
        }
    } else {
        echo "Неверное значение";
    }
    var_dump($_POST);
    ?>
</form>

</body>

</html>