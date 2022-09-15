<?php
$a = 1;
$b = -2;
$c = -24;

function kr1($ds,$a,$b){
    return ((-$b + sqrt($ds)) / 2 * $a);}
function kr2($ds,$a,$b){
    return ((-$b - sqrt($ds)) / 2 * $a);}
function dis($a,$b,$c){
    return ($b*$b - 4*$a*$c);}
$ds = dis($a,$b,$c);
echo "Дискриминант" ."&nbsp;" . $ds . "<br>";
echo "Первый корень" . "&nbsp;" . (kr1($ds, $a,$b)) . "<br>";
echo "Второй корень" . "&nbsp;" . (kr2($ds, $a,$b));
