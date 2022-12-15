<?php

namespace src\controllerElements\BarController;
class BarController
{

    public function displayBar(): string
    {

        if (!isset($_SESSION['userID'])) {
            echo "<li class='nav-item'>
                            <a class='nav-link active' aria-current='page'
                               href='index.php?req=registration'>Registration</a>
                        </li>
                        <li class='nav-item'>
                            <a class='nav-link active' aria-current='page'
                               href='index.php?req=login'>Login</a>
                        </li>";
        } else {
            if (2 == $_SESSION['permission']) {
                echo '<li class="nav-item">
                                <a class="nav-link active" aria-current="page"
                                   href="index.php?req=admin">Administration</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active justify-content-end" aria-current="page"
                                   href="index.php?req=addPost">
                                    Add post</a></li>';
            }
            echo "<img src='{$_SESSION['avatar']}' 
                              class='rounded float-start'  width=60px height=100% alt='...'>
                                   <li class='nav-item'>
                            <a class='nav-link active justify-content-end' aria-current='page'
                               href='index.php?req=profile'>
                                   Profile</a></li>
                                   <form action='index.php?req=auth_logout' method='post'>
                <button type='submit' class='btn btn-danger' >Logout
                </button></form>
    ";

        }

        return '1';
    }
}