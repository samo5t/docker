<?php
require __DIR__ . '/app/Services/autoload.php';

$q = new Router();
$components = new Page();

$q->page('page1','page1');
$q->page('admin','admin');
$q->page('main','main');
$q->page('login','login');
$q->page('registration','registration');
$components->part('head.php');
$components->part('bar.php');
$q->enable();
