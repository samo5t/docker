<?php

class Post
{


    public function __construct(protected array $data){
    }

    /**
     * возвращает данные в массиве
     * @return array
     */
    public function getData(): array
    {
            return $this->data;
    }


}