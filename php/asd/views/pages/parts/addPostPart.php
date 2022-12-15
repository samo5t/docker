<?php
return
    '<body>
<form method="post" action="http://homework.local/asd/index.php?req=add_post" >
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