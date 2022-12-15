<?php

use src\controllerElements\ControllerElements;
use src\controllerElements\ContentController\ContentController;
$controllerElements = new ControllerElements();
?>
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">QWERTY</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php?req=main">Home</a>
                    </li>
                    <?php  $controllerElements->displayBarElement()?>

                </ul>
            </div>
        </div>
    </nav>

    <body>
    <?php $controllerElements->switchContent() ?>

<?php //} elseif ('main' === $c->switchContent('req')) {
//    foreach ($c->main() as $post) {
//        echo "<h1>{$post['title']}</h1><br><h3>{$post['text']}</h3><br><h4>{$post['author']}</h4><br><br>";
//    }
//} elseif ('profile' === $c->getRequest('req')) {
//    echo "<img src='{$_SESSION['avatar']}' class='rounded float-start'  width=500px alt='200'><h1
//          class='display-3'>Hi, {$_SESSION['userID']}<br> Permission = {$_SESSION['permission']} </h1>";
//} elseif ('admin' === $c->getRequest('req')) {
//    foreach ($c->adminPanel() as $k => $v) {
//        echo
//        "<img src='{$v['avatar']}' class='rounded float-start'  width=65px alt='...'><p class='fs-4'>
//            ID = {$v['id']} Email = {$v['email']} Permission = {$v['permission']} <br><br>
//            ";
//
//    }
//}
