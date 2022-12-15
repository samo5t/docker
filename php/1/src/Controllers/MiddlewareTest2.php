<?php

namespace App\Controllers;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class MiddlewareTest2
{
    public function __invoke(ServerRequestInterface $request, callable $next): ResponseInterface
    {
        return $next($request->withAttribute('middlewareTest2', 8));
    }
}