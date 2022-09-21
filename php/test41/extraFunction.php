<?php

function getUsersList($dir): bool|array
{
    return file($dir);
}

function authenticate(string $username, string $password, string $type): bool
{
    if ('login' === $type) {
        $file = explode(PHP_EOL, file_get_contents(__DIR__ . "/data.txt"));
        foreach ($file as $line) {
            list($username, $password) = explode(",", $line);
            if ($_POST['username'] == $username && password_verify($_POST['password'], $password))
                return true;
        }

    } elseif ('register' === $type) {
        $file = explode(PHP_EOL, file_get_contents(__DIR__ . "/data.txt"));
        foreach ($file as $line) {
            list($username, $password) = explode(",", $line);
            if ($_POST['register_username'] == $username)
                return true;
        }

    }
    return false;
}


function getCheckDB(string $username, string $password): bool
{

    if (authenticate($username, $password, 'login')) {
        $_SESSION['username'] = $username;
        $_SESSION['password'] = $password;
        return true;
    }
    return false;
}

;
function getNewUser(string $username, string $password, string $path): bool
{
    $entry = "$username" . ',' . password_hash($password, PASSWORD_DEFAULT) . "\n";
    $checkName = $username;

    if (checkLabel($checkName, 4) && !(authenticate($username,
            password_hash($password, PASSWORD_DEFAULT), 'register'))) {
        file_put_contents($path, $entry, FILE_APPEND | LOCK_EX);
        $sprav = getUsersList($path);
        foreach ($sprav as $value) {
            echo "{$value} <br>";
        }
        return true;
    }

    return false;
}
