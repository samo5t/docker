<?php
return
'<body>
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
</body>';

