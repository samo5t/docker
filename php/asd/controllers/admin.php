<?php
$q = new Router();
$d = new DB();
$data =[];
if (isset($_SESSION['userID']) && isset($_SESSION['permission']) && $_SESSION['permission'] == 2) {
   $listOfUsers = $d->query('select * from `USERS` ;',$data);
   foreach ($listOfUsers as $k=>$v){
     echo  include __DIR__ . '/../views/pages/parts/adminTable.php';
   }
} else {
    $q->redirect('profile');}