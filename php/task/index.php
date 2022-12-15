<?php

/**
 * Entry point of App
 */

use SebastianBergmann\Timer\ResourceUsageFormatter;
use SebastianBergmann\Timer\Timer;
use src\Controllers\Error;
use src\Controllers\Footer;
use src\Exceptions\DbException;
use src\Exceptions\MultipleException;
use src\Exceptions\NotFoundException;
use src\Logger;

try {

    require_once __DIR__ . '/vendor/autoload.php';


    $timer = new Timer;
    $timer->start();

    [$controller, $action] = include (__DIR__ . '/src/url.php');

    $class = 'src\\Controllers\\' . $controller;
    $ctrl = new $class;
    $ctrl($action);

    
} catch (MultipleException $errors) {

    $message = '';
    foreach($errors->getAll() as $e) {
        $message .= $e->getMessage() . '<br>';
        new Logger($e);
    }
    $collectedErrors = new MultipleException(
        $message,
        400
    );
    $ctrl = new Error();
    $ctrl($collectedErrors);

} catch (DbException | NotFoundException | Exception $e) {

    new Logger($e);
    $errorCtrl = new Error();
    $errorCtrl($e);

} finally {

    $duration = $timer->stop();
    $footer = new Footer(
        (new ResourceUsageFormatter)->resourceUsage($duration)
    );
    $footer('');

}