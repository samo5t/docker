<?php

class Page
{
    private string $rootPath = __DIR__ . '/../news/';
    protected string $path;
    protected array $data;
    public string $link;
    public string $time;

    public function __construct($path)
    {
        $this->path = $path;
        $this->time = date("F j, Y, g:i a");
        $lines = file($this->rootPath . $path, FILE_IGNORE_NEW_LINES);
        foreach ($lines as $line) {
            $this->data[] = $line;
        }
    }

    public function setLink($link)
    {
        $this->link = $link;
    }

    public function getPath()
    {
        return $this->path;
    }

    public function getData(): array
    {
        return $this->data;
    }


    public function getTime(): string
    {
        return $this->time;
    }
}