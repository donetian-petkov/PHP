<?php

//scalar types

#bool
$completed = true; // returns 1
#int
$score = 75;
#float
$price = 0.99;
#string
$greeting = "Hello Gio";

echo gettype($completed) . '<br />'; //return bool

var_dump($completed); //return type(value)

//compound types

#array
$companies = [1, 2, 3, true, "String"];
print_r($companies); // prints the array

#object
#callable
#iterable

// special types
# resource
# null

function sum($x, $y) {
    var_dump($x, $y); //string
    return $x + $y;

}

$sum = sum(2, '3'); // integer + string (converted to integer)

echo $sum;

var_dump($sum); //integer

// type hinting and strict type is not supported in PHP 8.0

//type casting
$x = (int) "5"; //cast the string to integer


