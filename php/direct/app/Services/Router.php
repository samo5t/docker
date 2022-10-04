<?php


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

    public function enable(): void
    {

        foreach ($this->list as $route) {
            if (isset($_GET['req']) && $route['uri'] === $_GET['req']) {
                require_once "views/pages/{$route['uri']}.php";
            }
        }
    }
}
