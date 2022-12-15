<?php

namespace App;

class Router
{

    private const METHOD_POST = 'POST';
    private const METHOD_GET = 'GET';
    private array $handlers;
    public function post(string $path, $handler): void
    {
        $this->addHandler(self::METHOD_POST,$path, $handler);
    }
    public function get(string $path, $handler): void
    {
        $this->addHandler(self::METHOD_GET,$path, $handler);
    }

    public function addHandler(string $method,string $path, $handler): void
    {
    $this->handlers[$method . $path] = [
        'path' => $path,
        'method' => $method,
        'handler' => $handler
    ];
    }
    public function run()
    {
        
    }
}