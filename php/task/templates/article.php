<?php
/** @var \src\Models\Article $this */
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
    <title><?= $this->article->getTitle() ?></title>
</head>
<body>
    <div class="wrapper">
        <div class="articles">
            <div class="article">
                <div class="article__header">
                    <div class="article__title">
                        <?= $this->article->getTitle() ?>
                    </div>
                </div>
                <div class="article__body">
                    <div class="article__content">
                        <?= $this->article->getContent() ?>
                    </div>
                </div>
                <div class="hr"></div>
                <div class="article__footer">
                    <div class="article__author">
                        <?= $this->article->getAuthor()->getName() ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>