<?php

function autoload($className): void
{
    require __DIR__ . '/' . str_replace('\\', '/', $className) . '.php';
}

spl_autoload_register(autoload(...));
