<!DOCTYPE html>
<html lang="ru">
<head>
    <title>calc</title>
</head>
<body>
<form action="/test21/test2.1.php" method="get">
    первое число: <input type="text" name="firstNumber">
    <br>
    второе число: <input type="text " name="secondNumber">
    <br>

    <input type="radio" id="plus"
           name="operation" value="plus">
    <label for="operationChoice1">сумма</label>

    <input type="radio" id="minus"
           name="operation" value="minus">
    <label for="operationChoice2">разница</label>

    <input type="radio" id="mul"
           name="operation" value="mul">
    <label for="operationChoice3">произведение</label>

    <input type="radio" id="div"
           name="operation" value="div">
    <label for="operationChoice4">частное</label><br>
    <button type="submit" name="result" value="result">" = "</button>
    <br>
    <?php
    $pattern = '#^[0-9.]+$#';
    $firstNumber = $_GET["firstNumber"];
    $secondNumber = $_GET["secondNumber"];
    function selectOperation(string $operation, int|float $numberOne, int|float $numberTwo): int|float
    {
        echo "результат ";
        switch (true) {
            case $operation === "mul":
                $res = $numberOne * $numberTwo;
                return $res;

            case $operation === "plus":
                $res = $numberOne + $numberTwo;
                return $res;

            case  $operation === "minus":
                $res = $numberOne - $numberTwo;
                return $res;

            case $operation === "div":
                $res = $numberOne / $numberTwo;
                return $res;

        };
        return 0;
    };


    $res = 0;
    echo set_error_handler('exceptions_error_handler');
    if (!preg_match($pattern, $firstNumber) && !preg_match($pattern, $secondNumber)) {
        echo "Введите числа";
    } else {
        echo "результат ";
        echo selectOperation($_GET["operation"], $firstNumber, $secondNumber);
    };


    ?>
</form>
</body>

</html>