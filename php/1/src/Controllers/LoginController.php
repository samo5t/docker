<?php

namespace App\Controllers;

use App\Core\TemplateRender\TemplateRender;
use Psr\Http\Message\RequestInterface;
use Sunrise\Http\Message\Response;

class LoginController
{
    public function __construct(private readonly TemplateRender $templateRender)
    {
    }

    public function action(RequestInterface $request): Response
    {
        $response = new Response();
        $response->getBody()->write($this->templateRender->render('LoginView'));
        return $response;

}
}