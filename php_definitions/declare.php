<?php

/** declare */

//declare - ticks

//declare - encoding

//declare - strict types

declare(strict_types=1);

function sum(int $x, int $y) {
    return $x + $y;
}

echo sum(1, 2); // this won't output an error
echo sum("1" , 2); //this will output an error due to strict type

