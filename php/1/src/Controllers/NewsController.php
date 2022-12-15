<?php

namespace App\Controllers;


use App\Core\TemplateRender\TemplateRender;
use Sunrise\Http\Message\Response;

class NewsController
{
    public function __construct(private readonly \PDO $db, private readonly TemplateRender $templateRender)
    {
    }

    public function __invoke(): Response
    {
        $response = new Response();
        $stmt = $this->db->query("SELECT * FROM POSTS");
        $response->getBody()->write($this->templateRender->render('anotherpage', $stmt->fetchAll()));
        return $response;
    }


}