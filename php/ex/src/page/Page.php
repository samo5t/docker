<?php

namespace src\page;
class Page
{

    public function part(string $part_name): void
    {
        require_once 'components/' . $part_name;
    }
}