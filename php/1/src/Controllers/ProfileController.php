<?php

namespace App\Controllers;
use App\Core\Controller;


class ProfileController extends Controller
{
    function __invoke()
    {
        if(!empty($_SESSION['email']) && !empty($_SESSION['currentLogin'])){
        echo $_SESSION['email'] . $_SESSION['currentLogin'];}
//        $model = new Model();
//        $model->getData($data);
        $this->view->generate(__DIR__ . '/../views/profileView.php', __DIR__ . '/../views/templateView.php');
    }
}