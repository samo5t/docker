<?php
$x = '';
if (isset($_POST['register'])) {
    $x = "Location: http://homework.local/test41/registration.php";
}
if (isset($_POST['login'])) {
    $x = "Location: http://homework.local/test41/login.php";
}
if (isset($_POST['download'])) {
    $x = "Location: http://homework.local/test41/send.php";
}
header($x);

