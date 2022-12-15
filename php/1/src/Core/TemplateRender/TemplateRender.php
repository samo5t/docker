<?php

namespace App\Core\TemplateRender;

class TemplateRender
{
    private $path;
    private $params = [];
    private $extends;

    public function __construct($path)
    {
        $this->path = $path;
    }

    /**
     * @param $view
     * @param array $params
     * @return string
     * Возвращает отрисовавнный шаблон с массивом параметров
     */
    public function render($view, array $params = []): string
    {
        $templatePath = $this->path . '/' . $view . '.php';
        extract($params, EXTR_SKIP);
        $this->extends = null;
        ob_start();
        require $templatePath;
        $html = ob_get_clean();
        if ($this->extends === null) {
            return $html;
        }
        return $this->render($this->extends, ['html' => $html]);
    }

    public function extend($view): void
    {
     $this->extends = $view;
    }
}