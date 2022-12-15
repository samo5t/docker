<?php
$this->params['title'] = 'anotherpage';
$this->extends = 'head';

?>
<div class="container">
    <h1>
    <?php
    /** @var array $params */
    foreach ($params as $post){
        echo $post['title'] . '<hr>' . $post['text'] . '<i><hr>' . $post['author']. '</i><hr>' ;
    }
    ?>

    </h1>
</body>
</div>
<footer class="app-footer">
    <div class="container">

    </div>
</footer>
</html>
