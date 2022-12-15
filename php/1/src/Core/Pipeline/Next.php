<?php

namespace App\Core\Pipeline;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class Next
{
    private array $middleware;
    private $default;

    public function __construct(array $middleware, callable $default)
    {
        $this->middleware = $middleware;
        $this->default = $default;
    }
    public function __invoke(ServerRequestInterface $request): ResponseInterface
    {
        if(!$current = array_shift($this->middleware)){
            ($this->default)($request);
        }

        return $current($request, function (ServerRequestInterface $request,$default)  {
            return $this($request);
        });
    }
}