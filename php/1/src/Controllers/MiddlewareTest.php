<?php

namespace App\Controllers;

use Narrowspark\HttpEmitter\SapiEmitter;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Sunrise\Http\Message\Response;
use Sunrise\Http\ServerRequest\ServerRequest;

class MiddlewareTest
{
    public function __invoke(ServerRequestInterface $request, callable $next): ResponseInterface
    {

       return $next($request->withAttribute('middlewareTest2', 8));
    }
}