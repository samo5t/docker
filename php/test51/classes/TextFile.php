<?php


class TextFile
{
    protected array $textFileArray;

    public function __construct(protected string $path)
    {
        $this->textFileArray = file($path);
    }

    public function getData(): array
    {
        return $this->textFileArray;
    }
    public function saveData(): void
    {

            file_put_contents($this->path,end($this->textFileArray ) . PHP_EOL,FILE_APPEND | LOCK_EX);


    }
}