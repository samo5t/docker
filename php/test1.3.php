<?php

$name = "Elena";

function rnd($name){
    return substr($name, -1);
};

switch (true){
    case rnd($name) == null:
        echo "нет имени";
        break;
    case rnd($name) == "a":
        echo "жен";
        break;
    default:
        echo "муж";}

