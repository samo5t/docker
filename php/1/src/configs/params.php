<?php
/** @var Container $container */


$container->set('config',
    ['db' =>
        ['dsn' => 'mysql:host=mysql_db;dbname=homework',
            'username' => 'root',
            'password' => 'root']
    ]);
