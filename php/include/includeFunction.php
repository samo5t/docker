<?php

function checkLabel(string $text, int $format): int
{
    $x = 0;
    $patternForRuLettersOnly = "/^[а-яё]+$/iu";
    $patternForEnLettersOnly = "/^[a-z]+$/iu";
    $patternForInteger = '/^\d+$/';
    $patternForFloat = '/^[0-9]*[.,][0-9]+$/';
    switch (true) {
        case preg_match($patternForRuLettersOnly, $text) && $format == 1:
            $x = 1;
            break;
        case preg_match($patternForInteger, $text) && $format == 2:
            $x = 1;
            break;
        case preg_match($patternForFloat, $text) && $format == 3:
            $x = 1;
            break;
        case preg_match($patternForEnLettersOnly, $text) && $format == 4:
            $x = 1;
            break;
    };
    return $x;
}


