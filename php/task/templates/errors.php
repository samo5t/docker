<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Error</title>
    <style>
        <?= $this->style ?>
    </style>
</head>
<body>
<div class="wrapper">
    <div class="error">
        <div class="error__header">
            <div class="error__code">
                Ошибка: <?= $this->error->getCode() ?>
            </div>
        </div>
        <div class="error__content">
            <div class="error__message">
                <?= $this->error->getMessage() ?>
            </div>
        </div>
    </div>
</div>
</body>
</html>