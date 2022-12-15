<?php

//простраства имен везде
class Page
{

    public function part(string $part_name): void
    {
        require_once 'components/' . $part_name;
    }
}