<?php

namespace App\Controllers;


use App\Core\Controller;
use App\Core\Extra\DB;
use Psr\Http\Message\ServerRequestInterface;

class MainController
{
    public function action(ServerRequestInterface $request)
    {
        $DB = new DB();
        if(!empty($_GET['page'])){
        $data['page'] = $_GET['page'];
        }
        if (!empty($data['page'])&&preg_match('/^[1-9][0-9]*$/', $data['page'])) {
            $sqlCheckEmail = 'select * from `POSTS` where id=:page;';
            $posts = $DB->query($sqlCheckEmail, $data);
        }else{$sqlCheckEmail = 'select * from `POSTS`;';
            $posts = $DB->query($sqlCheckEmail);}
        $this->view->generate(__DIR__ . '/../views/mainView.php', __DIR__ . '/../views/templateView.php', $posts);
    }
}