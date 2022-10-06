<?php
$DB = new DB();
$data=[];
$sqlCheckEmail = 'select * from `POSTS`;';
$posts = $DB->query($sqlCheckEmail, $data);
foreach ($posts as $post){
    echo "<h1>{$post['title']}</h1><br><h3>{$post['text']}</h3><br><h4>{$post['author']}</h4><br><br>";
}
?>