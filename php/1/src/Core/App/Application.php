<?php

namespace App\Core\App;

use App\Container\Container;
use App\Controllers\MiddlewareTest;
use App\Controllers\MiddlewareTest2;
use App\Controllers\NewsController;
use App\Controllers\NewsController2;
use App\Core\Pipeline\Pipeline;
use App\Router\Router;
use Narrowspark\HttpEmitter\SapiEmitter;
use Sunrise\Http\Message\Response;
use Sunrise\Http\ServerRequest\ServerRequestFactory;


class Application
{

    public function start(): void
    {

        $container = new Container();
        //params
        require __DIR__ . '/../../configs/params.php';
        //services
        require __DIR__ . '/../../configs/dependencies.php';


        $emitter = new SapiEmitter();
        try {
            $request = new (ServerRequestFactory::fromGlobals());
            $handlers = $container->get(Router::class)->start();
            $pipeline = $container->get(Pipeline::class);
            foreach (is_array($handlers) ? $handlers : [$handlers] as $handler){
                $pipeline->pipe($handler);
            }
            ;

            $response = $pipeline($request);
            $emitter->emit($response);

        } catch (\Exception $e) {
            $response = new Response();
            $response->getBody()->write(string: $e->getMessage());
            $emitter->emit($response);
        }
    }
}