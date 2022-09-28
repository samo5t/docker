<?php

class Post
{
    protected array $data;
    public string $link;

    public function __construct(array $data){
        $this->data = $data ;
    }
    public function setLink($link)
    {
        $this->link = $link;
    }

    public function getData(): array
    {
        return $this->data;
    }
}