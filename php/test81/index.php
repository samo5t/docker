<?php
include 'config.php';
require_once __DIR__ . '/classes/DB.php';
require_once __DIR__ . '/classes/View.php';
require_once __DIR__ . '/classes/Post.php';
$DB = new DB();
$view = new View();

$data = [];
$view->head('/../templates/head');
    $cout = ($DB->query('select * from `POSTS` order by id desc ', $data));
foreach ($cout as $value) {
    $post = new Post($value);
    $view->assign("post", $post);
    $view->display(template: '/../templates/template');
}

