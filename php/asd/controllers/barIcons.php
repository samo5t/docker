<?php
$c = new ControllerElements();

if (!isset($_SESSION['userID'])) {
    $c->displayElement('/../views/pages/icons/iconsLoginLogoutBar.php');
} else {
    if (2 == $_SESSION['permission']) {
        $c->displayElement('/../views/pages/icons/iconAdministration.php');
    }
    $c->displayElement('/../views/pages/icons/iconProfile.php');
    $c->displayElement('/../views/pages/icons/iconLogout.php');
}