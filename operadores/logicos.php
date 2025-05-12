<?php
    $a = 9;
    $b = 7;
    $c = 14;

    //OU ||
    $ou = ($a == $b || $a > 8 || $c <= 13);
    var_dump($ou);

    //E &&
    $e = ($a <> $b && $a > 8 && $c <= 13);
    var_dump($e);
?>