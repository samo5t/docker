<?php

namespace src\auth;
use src\DB\DB;
use src\router\Router;
class Auth
{
    public function logout(): void
    {
        $router = new Router();
        session_destroy();
        $router->redirect('main');
    }

    public function publish(array $data):void
    {
        var_dump($data);
        $q = new Router();
        $d = new DB();
        $text = $data['text'];
        $title = $data['title'];
        $author = $data['author'];
        if (!empty($text) && !empty($title) && !empty($author)){
            if (isset($_SESSION['userID']) && isset($_SESSION['permission']) && $_SESSION['permission'] == 2) {
                $listOfPosts = $d->query('insert into `POSTS` (title, text, author) VALUES (:title , :text, :author) ;', $data);
                $q->redirect('main');
            }
        } else {
            $q->errors(1000);}
    }

    public function register(array $data, array $files): void
    {
        $email = $data['email'];
        $password = $data['password'];
        $confirmPassword = $data['confirmPassword'];
        $avatar = $files['avatar'];
        $q = new Router();
        $fileName = time() . '_' . $avatar['name'];
        $sqlCheckEmail = 'select count(*) from `USERS` where email=:email and :password!=1 and :avatar!=1;';
        $sqlAddUser = 'INSERT INTO `USERS` (email, password, avatar) VALUES (:email , :password, :avatar);';
        $path = 'avatars/' . $fileName;
        if (move_uploaded_file($avatar['tmp_name'], $path)) {
            if ($confirmPassword === $password) {
                if (preg_match('#^[a-zA-Z0-9_\-.]#', $email)) {
                    $DB = new DB();
                    $data['avatar'] = $path;
                    if (($DB->query($sqlCheckEmail, $data))[0]['count(*)'] == 0) {
                        $DB->query($sqlAddUser, $data);
                    } else {
                        $q->errors(505);
                    }
                } else {
                    $q->errors(600);
                }
            } else {
                $q->errors(300);
            }
        } else {
            $q->errors(500);
        }
    }

    public function login(array $logindata): void
    {
        $DB = new DB();
        $password = $logindata['password'];
        $q = new Router();
        $sqlLogin = 'select * from `USERS`  where email=:email ;';
        $verify = $DB->query($sqlLogin, $logindata);
        if (isset($verify[0]) && password_verify($password, $verify[0]['password'])) {
            $_SESSION['userID'] = $verify[0]['email'];
            $_SESSION['avatar'] = $verify[0]['avatar'];
            $_SESSION['permission'] = $verify[0]['permission'];
            $q->redirect( 'admin');
        } else {
            unset($_SESSION);
            $q->errors(333);

        }
    }


}