<?php

namespace App\Core;

final class Pointer
{
    public function __construct(private $controller, private $actionMethod,private $link)
    {
    }

    public function getController()
    {
        return $this->controller;
    }
    public function getLink()
    {
        return $this->link;
    }
    public function getActionMethod()
    {
        return $this->actionMethod;
    }
}