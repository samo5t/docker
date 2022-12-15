<?php

namespace App\Controllers;

use App\Core\Extra\Auth;

class UserCheckerController
{
    function action()
    {
        $data = $_POST;
        $auth = new Auth();
        if ($auth->getVerify($data)) {
            $_SESSION['email'] = $_POST['email'];
            $_SESSION['currentLogin'] = true;
            header('Location: http://homework.local/1/?link=profile');
        } else {
            header('Location: http://homework.local/1/?link=login');
            session_destroy();
        }
    }
}