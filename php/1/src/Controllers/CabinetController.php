<?php

namespace App\Controllers;


use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Sunrise\Http\Message\Response;

class CabinetController
{
    public function action(ServerRequestInterface $request): ResponseInterface
    {

        $username = $request->getAttribute('username');
         $response = new Response();
        $response->getBody()->write($username);
         return $response;
    }

}