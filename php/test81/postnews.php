<?php
require_once __DIR__ . '/classes/DB.php';
require_once __DIR__ . '/classes/View.php';
require_once __DIR__ . '/classes/Post.php';

$DB = new DB();
$view = new View();
$data = $_GET;
$view->head('/../templates/head');
$cout = ($DB->query('select * from `POSTS` where id=:id ',$data));
$post = new Post($cout);
$view->assign("post", $post);
$view->display(template: '/../templates/templateForPost');



