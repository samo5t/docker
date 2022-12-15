<?php
namespace App\Core\Extra;


class Model
{
    public function getData(array $data)
    {
        $auth = new Auth();
        $auth->publish($data);
    }


}