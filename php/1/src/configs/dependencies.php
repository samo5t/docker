<?php
/** @var Container $container */

use App\Container\Container;
use App\Controllers\MiddlewareTest;
use App\Controllers\MiddlewareTest2;
use App\Controllers\NewsController;
use App\Controllers\NewsController2;
use App\Core\TemplateRender\TemplateRender;
use App\Router\Router;
use \App\Core\Pipeline\Pipeline;
use App\Controllers\LoginController;


$container->set(\PDO::class, function (Container $container) {
    return new \PDO($container->get('config')['db']['dsn'],
        $container->get('config')['db']['username'],
        $container->get('config')['db']['password']);
});
$container->set(Router::class, function (Container $container){
    return new Router($container);
});
$container->set(NewsController::class, function (Container $container){
    return new NewsController($container->get(\PDO::class), $container->get(TemplateRender::class));
});
$container->set(LoginController::class, function (Container $container){
    return [new LoginController($container->get(TemplateRender::class)), 'action'];
});
$container->set(Pipeline::class, function (){
    return new Pipeline();
});
$container->set(MiddlewareTest::class, function (){
    return new MiddlewareTest();
});
$container->set(MiddlewareTest2::class, function (){
    return new MiddlewareTest2();
});

$container->set(TemplateRender::class, function (){
    return new TemplateRender(__DIR__ . '/../templates');
});
$container->set(NewsController2::class, function (Container $container){
    return [new NewsController2($container->get(TemplateRender::class)), 'action'];
});