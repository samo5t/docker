<?php

require_once __DIR__ . '/application/views/Page.php';
require_once __DIR__ . '/application/views/View.php';

$page = new Page('qwe');
$view = new View();
$data = $page->getData();
$view->assign(name: 'page', value: $page);
$view->display(template: 'template');
