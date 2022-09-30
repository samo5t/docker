<?php

namespace models;
class User
{
    public function __construct(protected string $nickname, protected string $password, protected int $permission)
    {
    }

}