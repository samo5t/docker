<?php
/** @var \src\View $this */
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        <?= $this->style ?>
    </style>
    <title>Admin Articles</title>
</head>
<body>
<div class="wrapper">
    <?= $this->adminDataTable ?>
    <div class="articles">
        <?php
        foreach ($this->articles as $article) {
            ?>
            <div class="article">
                <form action="/admin/edit?id=<?= $article->getId() ?>" method="post">
                    <div class="article__header">
                        <div class="article__title">
                            <input type="text" name="title" value="<?= $article->getTitle() ?>" placeholder="<?= $article->getTitle() ?>">
                        </div>
                    </div>
                    <div class="article__body">
                        <div class="article__content">
                            <textarea name="content" id="" cols="160" rows="10"><?= $article->getContent() ?></textarea>
                        </div>
                    </div>
                    <div class="hr"></div>
                    <div class="article__footer">
                        <div class="article__author">
                            <?= $article->getAuthor()->getName() ?>
                        </div>
                        <div class="update">
                            <button type="submit">Отправить</button>
                        </div>
                    </div>
                </form>
            </div>
            <?php
        }
        ?>
    </div>
</div>
</body>
</html>