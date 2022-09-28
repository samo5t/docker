<?php

require_once __DIR__ . '/application/views/Page.php';
require_once __DIR__ . '/application/views/View.php';
require_once __DIR__ . '/application/views/News.php';
//$pdo = new PDO('mysql:host=mysql_db;dbname=homework;', 'root', 'root');
//$sql = 'SELECT * FROM `test`';
//$query = $pdo->prepare($sql);
//$query->execute();
//var_dump($query->fetchAll(PDO::FETCH_ASSOC));die;
$view = new View();
$post = new News();
$files = array_filter(
    array: $post->scanNews('application/news/'),
    callback: fn(string $fileName): bool => !($fileName === '.' || $fileName === '..')
);

foreach ($files as $key => $value){

    $page = new Page(path: $value);
    $data = $page->getData();
    $view->assign(name: 'page', value: $page);
    $view->display(template: 'template');
}




