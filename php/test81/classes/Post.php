<?php

class Post
{


    public function __construct(protected array $data){
    }

    /**
     * @return array
     * возвращает данные в массиве
     */
    public function getData(): array
    {
            return $this->data;
    }


}