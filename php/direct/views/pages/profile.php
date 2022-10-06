<?php
$q = new Router();
if (isset($_SESSION['userID'])){
    echo "<img src='{$_SESSION['avatar']}' class='rounded float-start'  width=500px alt='200'><h1 class='display-3'>Hi,{$_SESSION['userID']}</h1>";;
}else{
    $q->redirect('login');
}
