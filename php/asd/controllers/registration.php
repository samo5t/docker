<?php
if (!isset($_SESSION['userID'])) {
   echo include __DIR__ . '/../views/pages/parts/registrationPart.php';
} else {
   echo include __DIR__ . '/../views/pages/parts/profilePart.php';
}