<?php

namespace App\Core\Pipeline;

use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ServerRequestInterface;
use Sunrise\Http\Message\Request;
use Sunrise\Http\Message\Response;

class Pipeline
{

    public function pipe(callable $middlewares): void
    {
        $this->middlewares[] = $middlewares;
    }

    /**
     * @param ServerRequestInterface $request
     * @return ServerRequestInterface|void
     * Очередный запуск midlleware'ов
     */
    public function __invoke(ServerRequestInterface $request): Response
    {

        if (!empty($this->middlewares)) {
            $current = array_shift($this->middlewares);
            if ($current !== null) {
                return $current($request, $this);
            }
            return $request;
        }
    }


}