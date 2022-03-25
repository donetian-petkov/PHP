<?php


//parameters vs arguments - arguments are what you pass to the function and parameters is what the function expects to be passed to it

function test1(int|float $x, int|float $y = 10) {
    return $x * $y;
}//the default value has to be declared last

//splatter parameters

function test2(...$numbers) {

} // when we do not know how many arguments will be passed, any type

function test3(int|float ...$numbers) {

} //the arguments have to be int or float no matter how many there are

function test4(int $y, int $x, ...$numbers) {

}//the splatter arguments must be at the end when using other defined parameters

$numbers = [1, 2, 3, 4];

echo test4(1, 2, ...$numbers); //how to unpack an array as an argument

//named arguments - since PHP 8.0

function test5(int $x , int $y): int {

    if ($x == 3) {
        return 2;
    } elseif ($y == 3) {
        return 4;
    }
    return 1;
}

test5(y: 3, x: 4); // returns 4, even though the x comes first in the function parameters, when we call the function we can tell it which arguments are we supplying

setcookie(name: 'foo', value: 'bar', httponly: true); // instead of providing every single argument, we can choose only handful, the missing arguments have to have default values

test5(5, y:4); // using positional arguments and named arguments - first positional then named

$arr = ['x' => 1, 'y' => 2];

foo(...$arr); //this equals - foo(x: 1, y: 2);

