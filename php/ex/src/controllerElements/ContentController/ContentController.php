<?php

namespace src\controllerElements\ContentController;

use src\DB\DB;
use src\router\Router;

class ContentController
{
    public function admin(): void
    {
        $router = new Router();
        $DB = new DB();
        $data = [];
        if (isset($_SESSION['userID']) && isset($_SESSION['permission']) && $_SESSION['permission'] == 2) {
            foreach ($DB->query('select * from `USERS` ;', $data) as $k => $v) {
                echo "<img src='{$v['avatar']}' class='rounded float-start'  width=65px alt='...'><p class='fs-4'>
            ID = {$v['id']} Email = {$v['email']} Permission = {$v['permission']} <br><br>
            ";
            }
        } else {
            unset($_GET);
            $router->redirect('profile');
        }

    }

    public function main(): void
    {
        $DB = new DB();
        $data = [];
        $content = '';
        $sqlCheckEmail = 'select * from `POSTS`;';
        foreach ($DB->query($sqlCheckEmail, $data) as $post) {
            $content = $content . "<h1>{$post['title']}</h1><br><h3>{$post['text']}</h3><br><h4>{$post['author']}</h4><br><br>";
        }
        echo $content;
    }

    public function profile(): void
    {
        $router = new Router();
        if (isset($_SESSION['userID'])) {
            echo "<img src='{$_SESSION['avatar']}' class='rounded float-start'  width=500px alt='200'><h1 
          class='display-3'>Hi, {$_SESSION['userID']}<br> Permission = {$_SESSION['permission']} </h1>";
        } else {
            unset($_GET);
            $router->redirect('login');
        }

    }

    public function login(): void
    {
        $router = new Router();
        if (!isset($_SESSION['userID'])) {
            echo '<form method="post" action="http://homework.local/ex/index.php?req=auth_login">
        <div class="form-floating mb-3">
            <input type="email" name="email" class="form-control" id="floatingInput" placeholder="name@example.com">
            <label for="floatingInput">Email address</label>
        </div>
        <div class="form-floating">
            <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password">
            <label for="floatingPassword">Password</label><br>
            <button type="submit" class="btn btn-secondary btn-lg">Login</button>
        </div>
    </body>';
        } else {
            unset($_GET);
            $router->redirect('main');
        }
    }

    public function registration(): void
    {
        echo '
<form method="post" action="http://homework.local/ex/index.php?req=auth_register" enctype="multipart/form-data" >
<div class="form-floating mb-3">

    <input type="email" name = "email" class="form-control" id="floatingInput" placeholder="name@example.com">
    <label for="floatingInput">Email address</label>
</div>
<div class="form-floating">
    <input type="password" name ="password" class="form-control" id="floatingPassword" placeholder="Password">
    <label for="floatingPassword">Password</label><br>
</div>
    <div class="form-floating">
    <input type="password" name ="confirmPassword" class="form-control" id="confirmPassword" placeholder="Confirm password">
    <label for="confirmPassword">Confirm password</label><br>
    <div class="input-group mb-3">
        <label class="input-group-text" for="inputGroupFile01">Upload</label>
        <input type="file" name = "avatar"class="form-control" id="inputGroupFile01">
    </div>
    <button type="submit" class="btn btn-secondary btn-lg" >Registration</button>
</div>
';
    }

    public function addPost(): void
    {
        echo '
<form method="post" action="http://homework.local/ex/index.php?req=add_post" >
        <div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Автор</label>
  <input type="text" required class="form-control" name="author">
  
  <label for="exampleFormControlInput1" class="form-label">Название статьи</label>
  <input type="text" required class="form-control" name="title">
</div>
<div class="mb-3">
  <label for="exampleFormControlTextarea1" class="form-label">Текст</label>
  <textarea class="form-control" required name="text" rows="5"></textarea><br>
  <button type="submit" class="btn btn-secondary btn-lg">Опубликовать</button>
</div>
        </form>';
    }
}