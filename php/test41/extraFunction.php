<?php

function getUsersList($dir): bool|array
{
        return file($dir);
}
function authenticate($username, $password){
    $file = explode( PHP_EOL, file_get_contents( __DIR__ . "/data.txt" ));
    foreach( $file as $line ) {
        list($username, $password) = explode(",", $line);
        if ($_POST['username'] == $username && $_POST['password'] == $password)
            return true;
    }
    return false;
}