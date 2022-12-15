<?php
return
    "<img src='{$_SESSION['avatar']}' class='rounded float-start'  width=500px alt='200'><h1 
          class='display-3'>Hi, {$_SESSION['userID']}<br> Permission = {$_SESSION['permission']} </h1>";