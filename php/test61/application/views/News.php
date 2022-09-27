<?php

class News
{
    protected string $path;


    public function scanNews(string $path): array
    {

        return scandir($path);
    }

}