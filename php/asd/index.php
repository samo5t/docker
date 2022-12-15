<?php
namespace Samost\Direct;
session_start();
//загрузка по psr

require __DIR__ . '/vendor/autoload.php';
include 'components/config.php';

use \Router;

$q = new Router();
//$components = new Page();
//$components->part('head.php');
//$components->part('bar.php');
//
//$q->page('admin','admin');
$q->page('main','main');
//$q->page('login','login');
//$q->page('addPost','addPost');
//$q->page('registration','registration');
//$q->page('profile','profile');
//
//$q->post('add_post','publish',true,false);
//$q->post('auth_register','register',true,true);
//$q->post('auth_login','login',true,false);
//$q->post('auth_logout','logout',false,false);
//
//$q->enable();
//$c = new ControllerElements();
//$c->adminPanel();