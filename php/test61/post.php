<?php
require_once __DIR__ . '/application/views/Page.php';
require_once __DIR__ . '/application/views/View.php';

$view = new View();

$page =  new Page("$_GET[id]");
$view->assign('page', $page);
$view->display('templateForPost');
