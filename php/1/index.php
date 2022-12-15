<?php


namespace App;

use App\Core\App\Application;

require __DIR__ . '/vendor/autoload.php';

$application = new Application();
$application->start();