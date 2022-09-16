<!doctype html>
<html lang="ru">
<head>

    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Document</title>
</head>
<body>
<?php

$names =
    ["Елена",
    "Екатерина",
    "Виталий",
    "Антон",
    "Павел",
    "Алена",
    " ",
    "Наталья",
    "Иван",
    "Аркадий",
    "Илья",
    "123321"
    ];

function checkName(string $name): string
{
    if (mb_substr($name, -1) === 'а' || mb_substr($name, -1) === 'я') {
        return "вероятно женское";
    }

    if (mb_substr($name, -2, 2) === 'ий'
        || mb_substr($name, -2, 2) === 'ей'
        || preg_match('#^[цкнгшщзхфвпрлджячсмтб]$#', mb_substr($name, -1))
    ) {
        return "вероятно мужское";
    }

    return "Неверное значение";
}

foreach ($names as $name) {
    echo $name . "--" . CheckName($name) . "<br>";
};


?>
</body>
</html>


