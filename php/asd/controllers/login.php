<?php
$q = new Router();
if (isset($_SESSION['userID'])){
    $q->redirect('profile');
}else{
echo include __DIR__ . '/../views/pages/parts/loginPart.php';
}

