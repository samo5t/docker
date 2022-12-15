<?php
$this->params['title'] = 'Login';
$this->extends = 'head';

?>

<h1>Страница авторизации</h1>
<p>
<form action="http://homework.local/1/?link=userChecker" method="post">
    <table class="login">
        <tr>
            <th colspan="2">Авторизация</th>
        </tr>
        <tr>
            <td>Логин</td>
            <td><input type="text" name="email"></td>
        </tr>
        <tr>
            <td>Пароль</td>
            <td><input type="password" name="password"></td>
        </tr>
        <th colspan="2" style="text-align: right">
            <input type="submit" value="Войти" name="btn"
                   style="width: 150px; height: 30px;"></th>
    </table>
</form>
</p>
