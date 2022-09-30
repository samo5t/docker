<?php


use app\models\DB;
use \app\models\Post;
use app\views\View;


require __DIR__ . '/autoload.php';


include 'config.php';

$DB = new DB();
$view = new View();

$data = [];
$view->head('templateHead');
$cout = ($DB->query('select * from `POSTS` order by id desc ', $data));
$post = new Post($cout);
$view->assign("post", $post);
$view->display(template: '/../views/templateMain');


