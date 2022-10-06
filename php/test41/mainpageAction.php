<?php
session_start();
$path = __DIR__ . "/data.txt";
if (file_exists(__DIR__ . "/extraFunction.php")){
include __DIR__ . "/extraFunction.php";}
else{
    echo 'нет файла';
}
$imgpath = __DIR__ . '/upload/';
$usersWithPasswordsDB = makeKeyValues($path);

switch (true) {
    case (isset($_GET['idAction']) && ('registration' === $_GET['idAction'])) :
        registrationAction($path, $usersWithPasswordsDB);
        mainpageAction($imgpath);
        break;
    case (isset($_GET['idAction']) && 'login' === ($_GET['idAction'])):
        loginAction($usersWithPasswordsDB);
        mainpageAction($imgpath);
        break;
    case (isset($_GET['idAction']) && ($_GET['idAction'] === 'send')):
        downloadAction();
        mainpageAction($imgpath);
        break;
    case (isset($_SESSION['username'])):
        outputForMembers($_SESSION['username']);
        mainpageAction($imgpath);
        break;
    default:
        mainpageAction($imgpath);
}

unset($_SESSION);
unset($_GET);