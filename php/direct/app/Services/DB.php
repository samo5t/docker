<?php

class DB
{
    private array $configData;

    public function __construct()
    {
        $this->configData = include __DIR__ . '/../../components/config.php';
    }

    public function execute(string $sql): bool
    {
        $dbh = new PDO("mysql:host={$this->configData[2]};dbname={$this->configData[3]}", $this->configData[0], $this->configData[1]);
        $sth = $dbh->prepare($sql);
        return $sth->execute();
    }

    public function query(string $sql, array $data)
    {
        $dbh = new PDO("mysql:host={$this->configData[2]};dbname={$this->configData[3]}", $this->configData[0], $this->configData[1]);
        $sth = $dbh->prepare($sql);
        if ($data) {
            if(isset($data['avatar'])) {
                $sth->execute([':email' => $data['email'], ':password' => password_hash($data['password'],PASSWORD_DEFAULT), ':avatar' => $data['avatar']]);
            }
            else{
                $sth->execute([':email' => $data['email']]);
            }
        } else {
            $sth->execute();
        }
        return $sth->fetchAll(PDO::FETCH_ASSOC);
    }
}