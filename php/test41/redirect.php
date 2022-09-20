<?php
$x = '';
if (isset($_POST['register'])) {
    $x = "Location: http://homework.local/test41/registration.php";
}
if (isset($_POST['login'])) {
    $x = "Location: http://homework.local/test41/login.php";
}
if (isset($_POST['incorrectInput'])) {
    $x = "Location: http://homework.local/test41/incorrect.php";
}

header($x);
?>
