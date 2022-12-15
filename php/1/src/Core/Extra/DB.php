<?php

namespace App\Core\Extra;

use PDO;

class DB
{

    private string $path;
    private PDO $pdo;

    public function __construct()
    {
//        $this->path = $path;
        $configData = require_once __DIR__ . '/../components/config.php';
        $this->pdo = new PDO("mysql:host={$configData[2]};dbname={$configData[3]}", $configData[0], $configData[1]);
    }

    public function execute(string $sql): bool
    {
        $dbh = $this->pdo;
        $sth = $dbh->prepare($sql);
        return $sth->execute();
    }

    public function query(string $sql, array $data = []): bool|array
    {

        $dbh = $this->pdo;
        $sth = $dbh->prepare($sql);
        $dataSql = [];
        foreach ($data as $k => $v) {
            $dataSql[':' . $k] = $v;
        }

        $sth->execute($dataSql);
        return $sth->fetchAll(PDO::FETCH_ASSOC);
    }
}
