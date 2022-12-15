<?php

namespace src\controllerElements;


use src\controllerElements\BarController\BarController;
use src\controllerElements\ContentController\ContentController;

class ControllerElements
{

    public function displayBarElement(): string
    {
        $barController = new BarController;
        return $barController->displayBar();
    }

    public function switchContent()
    {
        if (isset($_GET['req'])){
            $get = $_GET['req'];
        $contentController = new ContentController();
        return match ($get) {
            'login', 'main', 'admin', 'profile','registration','addPost' => $contentController->$get(),
            default => '',
        };}
    }
}
