<?php

if (file_exists(__DIR__ . "/../include/includeFunction.php")) {
    include __DIR__ . "/../include/includeFunction.php";
}
else{
    echo 'файл не найден';
}

/**
 * Создание массива логин-пароль из файла
 * @param string $dir
 * @return array
 */
function makeKeyValues(string $dir): array
{
    $file = explode(PHP_EOL, file_get_contents($dir));
    $usersWithPasswords = [];
    foreach ($file as $line) {
        $usernameAndPassword = explode(",", $line);
        $usersWithPasswords[] = ['username' => $usernameAndPassword[0], 'password' => $usernameAndPassword[1]];
    }
    return $usersWithPasswords;
}

/**
 * Если параметр $type === 'login', проверяет в базе логин и хэш пароля.
 * Если параметр $type === 'register', проверяет не занят ли пароль.
 * @param string $sendUsername
 * @param string $sendPassword
 * @param string $type
 * @param array $usersWithPasswords
 * @return bool
 */
function authenticate(string $postUsername, string $postPassword, string $type, array $usersWithPasswords): bool
{
    if ('login' === $type) {
        foreach ($usersWithPasswords as $line) {
            if ($postUsername == $line['username'] && password_verify($postPassword, $line['password'])) {

                return true;
            }
        }

    } elseif ('register' === $type) {
        foreach ($usersWithPasswords as $line) {
            if ($postUsername == $line['username'])
                return true;
        }

    }

    return false;
}

/**
 * Получает логин и пароль, если проверка пройдена, то сохраняет их в сессии.
 * @param string $username
 * @param string $password
 * @param array $usersWithPasswords
 * @return bool
 */
function getCheckDB(string $username, string $password, array $usersWithPasswords): bool
{
    if (authenticate($username, $password, 'login', $usersWithPasswords)) {
        $_SESSION['username'] = $username;
        $_SESSION['password'] = $password;
        return true;
    }

    return false;
}

/**
 * Записывает данные нового пользователя в файл, в формате login,password, пароль хэшируется,
 * логин проверяется на соответсвие нужному формату текста
 * @param string $username
 * @param string $password
 * @param string $path
 * @param array $usersWithPasswords
 * @return bool
 */
function makeNewUser(string $username, string $password, string $path, array $usersWithPasswords): bool
{
    $entry = "$username" . ',' . password_hash($password, PASSWORD_DEFAULT) . "\n";
    if (checkForEnLettersOnly($username) &&
        !(authenticate($username, password_hash($password, PASSWORD_DEFAULT), 'register', $usersWithPasswords))) {
        file_put_contents($path, $entry, FILE_APPEND | LOCK_EX);

        return true;
    }

    return false;
}

/**
 * Получает полный тип файла и переводит его в сокращенный вид.
 * @param string $imagetype
 * @return false|string
 */
function getExtension(string $imageType): bool|string
{
    if (empty($imageType)) return false;

    return match ($imageType) {
        'image/bmp' => '.bmp',
        'image/cis-cod' => '.cod',
        'image/gif' => '.gif',
        'image/ief' => '.ief',
        'image/jpeg' => '.jpg',
        'image/pipeg' => '.jfif',
        'image/tiff' => '.tif',
        'image/x-cmu-raster' => '.ras',
        'image/x-cmx' => '.cmx',
        'image/x-icon' => '.ico',
        'image/x-portable-anymap' => '.pnm',
        'image/x-portable-bitmap' => '.pbm',
        'image/x-portable-graymap' => '.pgm',
        'image/x-portable-pixmap' => '.ppm',
        'image/x-rgb' => '.rgb',
        'image/x-xbitmap' => '.xbm',
        'image/x-xpixmap' => '.xpm',
        'image/x-xwindowdump' => '.xwd',
        'image/png' => '.png',
        'image/x-jps' => '.jps',
        'image/x-freehand' => '.fh',
        default => false,
    };
}
/**
 * Получает имя пользователя и использует его для вывода на страницу.
 * @param $name
 * @return void
 */
function outputForMembers($name): void
{
    echo "<div class = 'center'><p> $name, вы вошли<br>
    <button class='button' type='submit' name='download' value='pic'>Загрузить</button>
            <br></div>";
}

/**
 * регистрация нового пользователя, запись данных, сохранение в сессии
 * @param string $path
 * @param array $usersWithPasswordsDB
 * @return void
 */
function registrationAction(string $path, array $usersWithPasswordsDB): void
{
    if (isset($_POST['register_username']) && isset($_POST['register_password']) &&
        makeNewUser($_POST['register_username'], $_POST['register_password'], $path, $usersWithPasswordsDB)) {
        unset($_SESSION);
        $_SESSION['username'] = $_POST['register_username'];
        outputForMembers($_SESSION['username']);
    } else {
        echo "Такой пользователь уже зарегистрирован";
    }
}

/**
 * Вход пользователя, проверка данных в базе, сохранение в сессии
 * @param array $usersWithPasswordsDB
 * @return void
 */
function loginAction(array $usersWithPasswordsDB): void
{
    if ((isset($_POST['username']) && isset($_POST['password'])) && getCheckDB($_POST['username'], $_POST['password'], $usersWithPasswordsDB)) {
        $_SESSION['username'] = $_POST['username'];
        outputForMembers($_SESSION['username']);
    } else {
        echo 'Неверный логин или пароль';
        unset($_SESSION['username']);
    }
}

/**
 * Загрузка и перемещение в хранилище изображения от авторизированного пользователя
 * @return void
 */
function downloadAction(): void
{

    $fileTmpName = $_FILES['picture']['tmp_name'];
    $name = md5_file($fileTmpName);
    $nameWithFormat = $name . get_extension($_FILES['picture']['type']);
    if (!move_uploaded_file($fileTmpName, __DIR__ . '/upload/' . $nameWithFormat)) {
        echo('При записи изображения на диск произошла ошибка.');
    } else {
        echo 'Изображение загружено';
    }
}

/**
 * Вывод всех загруженных изображений из хранилища
 * @param string $imgpath
 * @return void
 */
function mainpageAction(string $imgPath): void
{
    $files = scandir($imgPath);
    $files = array_slice($files, 2);
    foreach ($files as $file) {
        echo "<img src='upload/{$file}'width='500' height='500 ' >";
    }
}


