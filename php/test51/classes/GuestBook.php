<?php
require_once __DIR__ . '/TextFile.php';

class GuestBook extends TextFile
{

    public function __construct(string $path)
    {
        parent::__construct($path);
    }

    /**
     * добавление строки в последний элемент массива
     * @param string $text
     * @return void
     */
    public function append(string $text)
    {
       $this->textFileArray[] = $text;
    }

}