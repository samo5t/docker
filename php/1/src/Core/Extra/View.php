<?php
namespace App\Core\Extra;

class View

{
    function generate($contentView, $templateView, $data = null)
    {



        require_once '/'.$templateView;
    }
}
