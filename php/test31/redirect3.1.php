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
     * Считывает строки из файлы и помещает в массив, иначе исключение
     */
    function bookOfGuests($dir): bool|array
    {
        if (!file_exists($dir)) {
            throw new Exception('ошибка чтения');
        } else {
            return file($dir);
        }
    }


    if (!file_exists(__DIR__ . "/../include/includeFunction.php")) {
        include __DIR__ . "/../include/includeFunction.php";
    }
    if (file_exists(__DIR__ . "/data.txt")) {
        $path = __DIR__ . "/data.txt";
    }
    $date = new DateTime();
    if (isset($_POST['newNameInList'])) {
        $entry = "{$_POST["newNameInList"]} {$date->format('Y-m-d H:i:s')} \n";
    }
    $pattern = '/^[а-яё]+$/iu';
    $checkName = $_POST["newNameInList"];

    try {
        if (preg_match($pattern, $checkName)) {
            file_put_contents($path, $entry, FILE_APPEND | LOCK_EX);
            $sprav = bookOfGuests($path);
            foreach ($sprav as $value) {
                echo "{$value} <br>";
            }
        } else {
            echo "Неверное значение";
        }
    } catch (Exception $e) {
        $e->getMessage();
    }

    var_dump($_POST);
    ?>
</form>

</body>

</html>