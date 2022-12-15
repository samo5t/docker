<?php

namespace App\Core\Extra;



class Auth
{

    private DB $Db;

    public function __construct()
    {
        $this->Db = new DB();
    }
    public function logout(): void
    {
        session_destroy();
    }

    public function publish(array $data): void
    {
        $sql = 'insert into `POSTS` (title, text, author) VALUES (:title , :text, :author) ;';
        $this->Db->query(sql: $sql,data: $data);
    }


    public function register(array $data): bool
    {
        $emailData['email'] = $data['email'];
        $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
        $sqlCheckEmail = 'select count(*) from `USERS` where email=:email;';
        $sqlAddUser = 'INSERT INTO `USERS` (email, password) VALUES (:email , :password);';
        if (0 == ($this->Db->query(sql: $sqlCheckEmail, data: $emailData))[0]['count(*)']) {
            $this->Db->query(sql: $sqlAddUser,data: $data);
            return true;
        } else {
            return false;
        }
    }

    public function getVerify(array $data): bool
    {
        $emailData['email'] = $data['email'];
        $userData = $this->getUserData($emailData);
        if(!empty($userData)){
        $userDataForLogin['email'] = $userData[0]['email'];
        $userDataForLogin['password'] = $userData[0]['password'];
        if (password_verify($data['password'], $userDataForLogin['password'])) {
            return true;
        }}
        return false;
    }

    public function getUserData(array $data): array
    {
        $emailData['email'] = $data['email'];
        $sql = 'select * from `USERS`  where email=:email;';
        return $this->Db->query(sql: $sql,data:  $emailData);
    }
    public function getAllUsersData(): array
    {
        $sql = 'select * from `USERS` ;';
        return $this->Db->query(sql: $sql);
    }
}