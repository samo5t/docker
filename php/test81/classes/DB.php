<?php

class DB
{
    private array $configData;

    public function __construct()
    {
        $this->configData = include __DIR__ . '/../config.php';
    }

    /**
     * Проверка sql запроса
     * @param string $sql
     * @return bool
     */
    public function execute(string $sql): bool
    {
        $dbh = new PDO("mysql:host={$this->configData[2]};dbname={$this->configData[3]}", $this->configData[0], $this->configData[1]);
        $sth = $dbh->prepare($sql);
        return $sth->execute();
    }

    /**
     * Выполнение запроса с подстановкой переменных из массива, если он не пустой
     * @param string $sql
     * @param array $data
     * @return array|false
     */
    public function query(string $sql, array $data)
    {
        $dbh = new PDO("mysql:host={$this->configData[2]};dbname={$this->configData[3]}", $this->configData[0], $this->configData[1]);
        $sth = $dbh->prepare($sql);
        if ($data) {
            $sth->execute([':id'=>$data['id']]);
        } else {
            $sth->execute();
        }
        return $sth->fetchAll(PDO::FETCH_ASSOC);
    }
}