<?php

class View
{
    private array $data;

    public function assign($name, $value): void
    {
        $this->data[$name] = $value;

    }

    public function display(string $template): void
    {
        $path = __DIR__ . "/$template.php";
        $view = $this;
        extract($this->data);
        include $path;
    }
}