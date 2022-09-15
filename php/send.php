<?php

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