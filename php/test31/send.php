
<?php
$newClientLabel = $_POST["newNameInBook"];
array_push($sprav,$newClientLabel);
foreach ($sprav as $value) {
    echo "{$value} <br>";
    $path = __DIR__ . "/data.txt";

    function bookOfGuests($dir)
    {
        return file($dir);
    }

    $sprav = bookOfGuests($path);
    foreach ($sprav as $value) {
        echo "{$value} <br>";
};}