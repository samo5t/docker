<?php

class Page
{
    protected string $title;
    protected string $path;
    protected array $data;
    public string $time;

    public function __construct(string $title)
    {
        $this->title = $title;
        $this->path = __DIR__ . '/../data.txt';
        $this->time = date("F j, Y, g:i a");
        $lines = file($this->path, FILE_IGNORE_NEW_LINES);
        foreach ($lines as $line => $value) {
            $this->data[] = $line;
        }
    }

    public function getTitle(): string
    {
        return $this->title;
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