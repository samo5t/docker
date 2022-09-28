<?php

class DB
{
    private array $configData;

    public function __construct()
    {
        $this->configData = include __DIR__ . '/../config.php';
    }

    public function execute(string $sql): bool
    {
        $dbh=new PDO("mysql:host={$this->configData[2]};dbname={$this->configData[3]}", $this->configData[0], $this->configData[1]);
        $sth = $dbh->prepare($sql);
        return $sth->execute();
    }

    public function query(string $sql, array $data)
    {
        $dbh=new PDO("mysql:host={$this->configData[2]};dbname={$this->configData[3]}", $this->configData[0], $this->configData[1]);
        $sth = $dbh->prepare($sql);
        $sth->execute([':id'=>$data['id']]);
        $ret = $sth->fetchAll(PDO::FETCH_ASSOC);
        return $ret;
    }
}