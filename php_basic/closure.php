<?php

/** variable functions, anonymous functions and arrow functions */


//variable functions

function sum(int|float ...$numbers): int|float {
    return array_sum($numbers);
}

$x = 'sum';

echo $x(1, 2, 3); //executes the sum function as PHP looks for a function sum when defining the $x variable

$x ='sub';

if(is_callable($x)) {
    echo $x(1, 2, 3);
} else {
    echo 'Not Callable';
} //the $x can not be called as a function as the sub function does not exist

//variable functions won't work with language constructs such as isset, empty, unset, include, require, print....

//anonymous / lambda functions

$newSum = function (int|float ...$numbers): int|float {
    return array_sum($numbers);
};

echo $newSum(1, 2, 3); //returns 6;

$x = 5;

$anotherSum = function (int|float ...$numbers) use($x): int|float {
    echo $x;
    return array_sum($numbers) + $x;
}; //the $x is copied in the anonymous function, however, changing $x in the function won't change the global $x

$anotherSum(1, 2, 3); //returns 11

//we can set use($$x) and this will pass a reference to the global $x in the function, thus changing the $x will change the $x

//callback functions - when a function is passed to another function as an argument - three ways to set callback functions as arguments:

//First Option

$array = [1, 2, 3];

$array2 = array_map(function($element) {

    return $element * 2;

}, $array); // the anon function will be called for each element in the $array

//Second Option

$x = function($element) {

    return $element * 2;
};

$array2 = array_map($x, $array);

//Third Option

function named($element) {
    return $element*2;
} //notice that I do not need to add semicolon - anon functions requires it

$array = array_map('named', $array);

//arrow functions - php 7.4, inline callback function

$array = [1, 2, 3];

$array2 = array_map(fn($number) => $number * $number, $array);

//unlike anon functions we can use globally defined variables, however, we can not change the values
//unline JS you can not have multiline expressions in arrow functions - fn($x) => { } - this won't work

$x = 5;

$array2 = array_map(fn($number) => $number * $x, $array);



