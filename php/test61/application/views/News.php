<?php

class News
{
    protected string $path;

    /**
     * @param string $path
     * @return array
     * Возвращает файлы в директории
     */
    public function scanNews(string $path): array
    {

        return scandir($path);
    }

}