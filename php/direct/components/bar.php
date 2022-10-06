<nav class="navbar navbar-expand-lg bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">QWERTY</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="index.php?req=main">Home</a>
                </li>
                <?php
                if (!isset($_SESSION['userID'])) {
                    echo '
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="index.php?req=registration">Registration</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="index.php?req=login">Login</a>
                </li>';
                } else {
                    echo '<li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="index.php?req=profile">Profile';echo "<img src='{$_SESSION['avatar']}' class='rounded float-start'  width=30px alt='...'><h1 class='display-3'></a>
                </li>
                <form action='index.php?req=auth_logout' method='post'>
                <button type='submit' class='btn btn-danger'>Logout
                </button></form>";
                }
                ?>
            </ul>
        </div>
    </div>
</nav>