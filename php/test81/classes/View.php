<?php

use app\views\Post;

class View
{
    private array $data;

    public function assign(string $name,Post $value): void
    {
        $this->data[$name] = $value;
    }

    public function head(string $template): void
    {
        include  __DIR__ . "/$template.php";
    }
    public function display(string $template): void
    {
        $path = __DIR__ . "/$template.php";
        $view = $this;
        extract($this->data);
        include $path;
    }


    public function render(string $template)
    {
        ob_start();
        $this->display($template);
        $s = ob_get_contents();
        ob_end_clean();
        return $s;
    }
}