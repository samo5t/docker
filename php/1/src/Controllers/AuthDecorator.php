<?php

namespace App\Controllers;

use http\Exception;
use Psr\Http\Message\ServerRequestInterface;
use Sunrise\Http\Message\Response;

class AuthDecorator
{


    public function __invoke(ServerRequestInterface $request)
    {
        $username = $request->getServerParams()['PHP_AUTH_USER'] ?? null;
        $password = $request->getServerParams()['PHP_AUTH_PW'] ?? null;
//        if (!empty($username) && !empty($password)){
//            foreach ($this->users as $name=>$pass){
//                if ($username===$name && $password===$pass){
//                    return ($this->nextAction)($request->withAttribute('username', $username));
//                }
//            }
//        }
//
        return new Response(401,'123',['WWW-Authenticate'=>'Basic realm=Restricted area']);

    }
}