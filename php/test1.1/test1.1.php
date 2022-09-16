<?php
$pr5 = "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" ;

$x = 1;
$y = 0;

function boolstr($a,$b, $pr){
    return  $a . $b . $pr .  (boolval($a && $b )? '1' : '0') . $pr . (boolval($a || $b )? '1' : '0') . $pr .(boolval($a xor $b )? '1' : '0'). "<br>";
}

echo $pr5 . "&&" . $pr5. "||" . $pr5 . "xor<br>";
echo boolstr($x,$x,$pr5);
echo boolstr($x,$y,$pr5);
echo boolstr($y,$y,$pr5);
