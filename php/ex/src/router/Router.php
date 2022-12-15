<?php

namespace src\router;
use src\auth\Auth;
use src\controllerElements\ControllerElements;
class Router
{
    public array $list;

    public function page(string $uri, string $page_name): void
    {
        $this->list[] = [
            'uri' => $uri,
            'page' => $page_name
        ];
    }

    public function post(string $uri, string $method, bool $formdata, bool $files): void
    {
        $auth = new Auth();
        $this->list[] = [
            'uri' => $uri,
            'class' => $auth,
            'method' => $method,
            'post' => true,
            'formdata' => $formdata,
            'files' => $files
        ];
    }

    public function enable(): void
    {

        foreach ($this->list as $route) {
            if (isset($_GET['req']) && $route['uri'] === $_GET['req']) {
                if ($_SERVER['REQUEST_METHOD'] === 'POST' && $route['post'] === true) {
                    $action = new  $route['class'];
                    $method = $route['method'];
                    $action->$method($_POST,$_FILES);
                } else {
                    require_once __DIR__ . "/../../components/bar.php";
                }
                die();
            }
        }
        $this->errors(404);
    }

    public function redirect(): void
    {
        $controllerElements = new ControllerElements();
        $controllerElements->switchContent();
    }
    public function errors(int $error): void
    {
        require_once "views/pages/errors/$error.php";
    }
}
