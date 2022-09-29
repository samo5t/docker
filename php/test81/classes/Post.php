<?php

class Post
{


    public function __construct(protected array $data){
    }


    public function getData(): array
    {
            return $this->data;
    }


}