<?php

use app\views\Post;

class View
{
    private array $data;

    /**
     * @param string $name
     * @param Post $value
     * @return void
     * сохраняет данные с заданным именем
     */
    public function assign(string $name, Post $value): void
    {
        $this->data[$name] = $value;
    }

    /**
     * @param string $template
     * @return void
     * Печатает head
     */
    public function head(string $template): void
    {
        if (file_exists(__DIR__ . "/$template.php")) {
            include __DIR__ . "/$template.php";
        }
    }

    /**
     * @param string $template
     * @return void
     * Если есть файл, выводит содержимое в браузер
     */
    public function display(string $template): void
    {if (file_exists(__DIR__ . "/$template.php")){
        $path = __DIR__ . "/$template.php";}
        $view = $this;
        extract($this->data);
        include $path;
    }

    /**
     * @param string $template
     * @return false|string
     * Возвращает содержимое файла
     */
    public function render(string $template)
    {
        ob_start();
        $this->display($template);
        $s = ob_get_contents();
        ob_end_clean();
        return $s;
    }
}