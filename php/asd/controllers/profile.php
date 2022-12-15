<?php
$q = new Router();
if (isset($_SESSION['userID'])){
    echo  include __DIR__ . '/../views/pages/parts/profilePart.php';
}else{
    $q->redirect('login');
}
