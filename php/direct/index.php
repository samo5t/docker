<?php
session_start();
require __DIR__ . '/app/Services/autoload.php';
include 'components/config.php';
$q = new Router();
$components = new Page();

$q->page('login','page1');
$q->page('admin','admin');
$q->page('main','main');
$q->page('login','login');
$q->page('registration','registration');
$q->post('auth_register','register',true,true);
$q->post('auth_login','login',true);
$components->part('head.php');
$components->part('bar.php');
$q->enable();
