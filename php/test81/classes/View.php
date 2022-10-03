<?php

use app\views\Post;

class View
{
    private array $data;

    /**
     * сохраняет данные с заданным именем
     * @param string $name
     * @param Post $value
     * @return void
     */
    public function assign(string $name, Post $value): void
    {
        $this->data[$name] = $value;
    }

    /**
     * Печатает head
     * @param string $template
     * @return void
     */
    public function head(string $template): void
    {
        if (file_exists(__DIR__ . "/$template.php")) {
            include __DIR__ . "/$template.php";
        }
    }

    /**
     * Если есть файл, выводит содержимое в браузер
     * @param string $template
     * @return void
     */
    public function display(string $template): void
    {if (file_exists(__DIR__ . "/$template.php")){
        $path = __DIR__ . "/$template.php";}
        $view = $this;
        extract($this->data);
        include $path;
    }

    /**
     * Возвращает содержимое файла
     * @param string $template
     * @return false|string
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