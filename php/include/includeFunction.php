<?php
/**
 * @param string $text
 * @return bool
 * проверки на символы строки
 */
function checkForRuLettersOnly(string $text):bool{
    $patternForRuLettersOnly = "/^[а-яё]+$/iu";
    return preg_match($patternForRuLettersOnly, $text);
}
function checkForEnLettersOnly(string $text):bool{
    $patternForEnLettersOnly = "/^[a-z]{30}+$/iu";
    return preg_match($patternForEnLettersOnly, $text);
}
function checkForInteger(string $text):bool{
    $patternForInteger = '/^\d+$/';
    return preg_match($patternForInteger, $text);
}
function checkForFloat(string $text):bool{
    $patternForFloat = '/^[0-9]*[.,][0-9]+$/';
    return preg_match($patternForFloat, $text);
}

