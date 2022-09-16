<?php
$a = 1;
$b = -2;
$c = -24;

function firstRoot(float $ds, float $a, float $b): float
{
    return (-$b + sqrt($ds)) / 2 * $a;
}

function secondRoot($ds, $a, $b)
{
    return ((-$b - sqrt($ds)) / 2 * $a);
}

function discriminant($a, $b, $c)
{
    return ($b * $b - 4 * $a * $c);
}

$ds = discriminant(a: $a,  c: $c, b: $b,);
echo "Дискриминант&nbsp; $ds <br>";
echo "Первый корень" . "&nbsp;" . (firstRoot($ds, $a, $b)) . "<br>";
echo "Второй корень" . "&nbsp;" . (secondRoot($ds, $a, $b));
assert(76 === discriminant(3, 4, -5));
assert(81 === discriminant(2, 5, -7));

// <pre></pre>