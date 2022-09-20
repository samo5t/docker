<?php

if (isset($_POST['register'])) {
    $x = "Location: http://homework.local/test41/registration.php";
} elseif (isset($_POST['login'])) {
    $x = "Location: http://homework.local/test41/login.php";
}
header($x);
?>
