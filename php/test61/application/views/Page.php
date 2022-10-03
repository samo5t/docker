<?php

class Page
{
    private string $rootPath = __DIR__ . '/../news/';
    protected string $path;
    protected array $data;
    public string $link;
    public DateTime $time;

    public function __construct($path)
    {
        $this->path = $path;
        $this->time = new DateTime();
        $lines = file($this->rootPath . $path, FILE_IGNORE_NEW_LINES);
        foreach ($lines as $line) {
            $this->data[] = $line;
        }
    }

    /**
     * @param $link
     * @return void
     * Устанавливает адрес страницы
     */
    public function setLink($link): string
    {
        $this->link = $link;
    }

    /**
     * @return string
     * возвращает путь к файлу с новостью
     */
    public function getPath(): string
    {
        return $this->path;
    }

    /**
     * @return array
     * возвращает массив строк из файла с новостью
     */
    public function getData(): array
    {
        return $this->data;
    }

    /**
     * @return string
     * возвращает дату новости
     */
    public function getTime(): string
    {
        return $this->time->format('Y-m-d H:i:s');
    }
}