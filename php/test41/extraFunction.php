<?php

/**
 * [['username'=>'dad', 'password'=>'dfdfgdfg'],['username'=>'dad', 'password'=>'dfdfgdfg'],['username'=>'dad', 'password'=>'dfdfgdfg']]
 * @param $dir
 * @return array
 */

include __DIR__ . "/../include/includeFunction.php";


function makeKeyValues(string $dir): array
{
    $file = explode(PHP_EOL, file_get_contents($dir));
    $usersWithPasswords = [];
    foreach ($file as $line) {
            $usernameAndPassword = explode(",", $line);
            $usersWithPasswords[] = ['username' => $usernameAndPassword[0], 'password' => $usernameAndPassword[1]];
    }
    return $usersWithPasswords;
}

function authenticate(string $sendUsername, string $sendPassword, string $type, array $usersWithPasswords): bool
{
    if ('login' === $type) {
        foreach ($usersWithPasswords as $line) {
            if ($sendUsername == $line['username'] && password_verify($sendPassword, $line['password']))
                return true;
        }

    } elseif ('register' === $type) {
        foreach ($usersWithPasswords as $line) {
            if ($sendUsername == $line['username'])
                return true;
        }

    }
    return false;
}


function getCheckDB(string $username, string $password, array $usersWithPasswords): bool
{

    if (authenticate($username, $password, 'login', $usersWithPasswords)) {
        $_SESSION['username'] = $username;
        $_SESSION['password'] = $password;
        return true;
    }
    return false;
}

function makeNewUser(string $username, string $password, string $path, array $usersWithPasswords): bool
{
    $entry = "$username" . ',' . password_hash($password, PASSWORD_DEFAULT) . "\n";
    $checkName = $username;

    if (checkForEnLettersOnly($checkName, 4) && !(authenticate($username,
            password_hash($password, PASSWORD_DEFAULT), 'register', $usersWithPasswords))) {
        file_put_contents($path, $entry, FILE_APPEND | LOCK_EX);

        return true;
    }

    return false;
}

function get_extension($imagetype)
{
    if (empty($imagetype)) return false;

    return match ($imagetype) {
        'image/bmp' => '.bmp',
        'image/cis-cod' => '.cod',
        'image/gif' => '.gif',
        'image/ief' => '.ief',
        'image/jpeg' => '.jpg',
        'image/pipeg' => '.jfif',
        'image/tiff' => '.tif',
        'image/x-cmu-raster' => '.ras',
        'image/x-cmx' => '.cmx',
        'image/x-icon' => '.ico',
        'image/x-portable-anymap' => '.pnm',
        'image/x-portable-bitmap' => '.pbm',
        'image/x-portable-graymap' => '.pgm',
        'image/x-portable-pixmap' => '.ppm',
        'image/x-rgb' => '.rgb',
        'image/x-xbitmap' => '.xbm',
        'image/x-xpixmap' => '.xpm',
        'image/x-xwindowdump' => '.xwd',
        'image/png' => '.png',
        'image/x-jps' => '.jps',
        'image/x-freehand' => '.fh',
        default => false,
    };
}

function outputForMembers($name): void
{
    echo "<div class = 'center'><p> $name, вы вошли<br>
    <button class='button' type='submit' name='download' value='pic'>Загрузить</button>
            <br></div>";
}