<?php /** @var Page $page */

?>


<T class="titletext"><b>
        <?php
        //var_dump($this->data);
        $id = $post->getData()['id'];
        $linkToPost = "http://homework.local/test81/postnews.php?id=$id";
        echo '<a href=' . $linkToPost . '>';
        echo $post->getData()['title'];
        echo '</a>';
        //        $s = $page->getData();


        //        ?>

</T>
</b>
<div>
    <p class="blocktext">
    <?php
    echo mb_substr($post->getData()['text'],0,200) . '...';
    ?></div>
</p>
</body>
</html>