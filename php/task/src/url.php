<?php

$uri = '/Admin/action';
$part = explode('/', $uri);

$controller = 'Articles';
$action = 'all';

if (empty($part[1])) {
    return [$controller, $action];
}

if (2 >= count($part)) {
    $controller = $part[1];
    $action = '';
    return [$controller, $action];
}

$action = implode(
    '', array_slice($part, -1)
);


$controller = implode(
    '\\', array_map('ucfirst', array_slice($part, 1, -1))
);

//var_dump($controller, $action);die;

return [$controller, $action];