<?php


class Auth
{

    public function register(array $data,array $files): void
    {
        $email = $data['email'];
        $password = $data['password'];
        $confirmPassword = $data['confirmPassword'];
        $avatar = $files['avatar'];
        $q = new Router();
        $fileName = time() . '_' . $avatar['name'];
        $path = 'avatars/' . $fileName;
        if (move_uploaded_file($avatar['tmp_name'], $path)) {
            if ($confirmPassword === $password) {
                if (preg_match('#^[a-zA-Z0-9_\-.]#', $email)) {
                    $DB = new DB();
                    $data['avatar'] = $path;
                    if ($DB->query("select * from `USERS` where email=:email;", $data)) {
                        $DB->query("INSERT INTO `USERS` (email, password, avatar) VALUES (:email , :password, :avatar);", $data);
                    }
                    else{
                        $q->errors(300);
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

    public function login(array $logindata):void
    {
        $DB = new DB();
        $password = $logindata['password'];
        $q = new Router();
        $verify = $DB->query("select * from `USERS`  where email=:email;", $logindata);
        if (isset($verify[0]) && password_verify($password, $verify[0]['password'])) {
            $_SESSION['userID'] = $verify[0]['email'];
            $_SESSION['avatar'] = $verify[0]['avatar'];
        } else {
            unset($_SESSION);
            $q->errors(333);

        }
    }


}