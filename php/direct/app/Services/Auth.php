<?php


class Auth
{
    public function logout(): void
    {
        $q = new Router();
        unset($_SESSION['userID']);
        $q->redirect('main');
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
            $q->redirect( 'main');
        } else {
            unset($_SESSION);
            $q->errors(333);

        }
    }


}