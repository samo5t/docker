<?php

namespace App\Controllers;


use App\Core\TemplateRender\TemplateRender;
use Psr\Http\Message\RequestInterface;
use Sunrise\Http\Message\Response;
use vakata\database\Exception;

class NewsController2
{
    public function __construct(private readonly TemplateRender $templateRender)
    {
    }

    public function action(RequestInterface $request): Response
    {
        $response = new Response();
        $response->getBody()->write($this->templateRender->render('homepage'));
        return $response;
    }

    public function edit(): string
    {
        return 'редактирование новости';
    }

    public function create()
    {
        return 'создание новости';
    }
}