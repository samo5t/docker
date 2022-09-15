<!DOCTYPE html>
<html lang="ru">
<head>
    <title>calc</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<form action = "/test2.1.php" method = "get">
    первое число: <input type = "number" name = "num1">
    <br>
    второе число: <input type = "number" name = "num2">
    <br>
    <button type = "submit" name = "but" value = "plus">"+"</button>
    <button type = "submit" name = "but" value = "minus">"-"</button>
    <button type = "submit" name = "but" value = "mul">"*"</button>
    <button type = "submit" name = "but" value = "div">"/"</button>
    <br>
    <?
    $num1 = $_GET["num1"];
    $num2 = $_GET["num2"];
    $res = 0;
    echo "результат ";
    switch (true){
        case $_GET["but"] == "mul":
            $res = $num1 * $num2;
            echo $res;
            break;
        case $_GET["but"] == "plus":
            $res = $num1 + $num2;
            echo $res;
            break;
        case $_GET["but"] == "minus":
            $res = $num1 - $num2;
            echo $res;
            break;
        case $_GET["but"] == "div":
            $res = $num1 / $num2;
            echo $res;
            break;
    };
    ?>
</form>
</body>

</html>