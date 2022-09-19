<?php

function checkLabel(string $text, int $format): int
{
    $x = 0;
    $patternForRuLettersOnly = "/^[а-яё]+$/iu";
    switch (true) {
        case preg_match($patternForRuLettersOnly, $text) && $format == 1:
            $x = 1;
            break;
    };
    return $x;
}

