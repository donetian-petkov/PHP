<?php

// Expressions - every thing after the = , functions as well, everything that it is evaluated

// Operators - takes one or more expressions and resolves it/them to a value

//Arithmetic operators (+ - * / % ** ) - apart from subtracting, multiplying and etc, + and - can convert values to int

$string = "1";

var_dump(-$string); // returns int(-1)
echo "<br />";

var_dump(10/3); //the int will be converted to float
echo "<br />";

// Asignments operators  (= += -= *= /= %= **==) - apart from basic use you may assign a single value to two variables at once

$num1 = $num2 = 50; //both $num1 and $num2 === 50

$num3 = ($num4 = 50) + 10;// $num === 60

// String operators (. .=)

$string = "Hello";

$string = $string . " World";

$string .= ". It is me, Dunkey!";

echo $string;
echo "<br />";

// Comparison operators (== , === , < , > , ? , ?? , ?: , !==, !=== , <>)

$x = "Test";

$y = "Test 2";

$result = $x === $y ? "They are the same!" : "They are not the same"; // returns They are not the same

$x = null;

$y = $x ?? 'hello'; // it will return hello since x is false

var_dump($y);
echo "<br />";

//Error control operators (@)

$x = @file('foo.txt'); // @ Suppress the error output of non-existent file

//Increment / Decrement operators (++ , --) - only strings and int are affected (strings are only affected by increment)

$string = 'abc';

echo ++$string; //it will return abd - the last character will be switched with the next character after it
echo "<br />";

//Logical Operators ($$ , || , ! , and , or , xor)

$x = true;
$y = false;

$z = $x and $y; //returns true, because the = operator takes precedence over the and operator - the = assignment returns true and the and is discarded

var_dump($x || $y); //the $y is short circuited since $x returns true
echo "<br />";
var_dump($y && $x); //the $x is short circuited since $y returns false
echo "<br />";

//Bitwise operators (& , | , ^ , ~ , << >>) - used for encryption, store permissions and etc

$x = 6;
$y = 3;

//110
//&
//011
//1 != 0 => 0 , 1 == 1 => 1 , 0 != 1 => 0 => 010 = 2

var_dump($x & $y); // returns 010 or 2
echo "<br />";

//110
//|
//011
//1 or 0 => 1 , 1 or 1 => 1 , 0 or 1 => 1 => 111 = 7

var_dump($x | $y); // returns 111 or 7
echo "<br />";

//110
//^
//011
//1 xor 0 => 1 as 1 does not equal 0, 1 xor 1 => 0 as 1 equals 1 , 0 xor 1 => 1 => 101 = 5

var_dump($x ^ $y); // returns 101 or 5
echo "<br />";

//~ flips the bits

//~110
//&
//011
//110 => 001
//001
//&
//011
//0 == 0 => 0, 0 != 1 => 0 , 1 == 1 => 1 => 001 or 1

var_dump(~$x & $y); // returns 001 or 1
echo "<br />";

// $x << $y shift
//110 or 6
//adding $y bits to $x
//110000 or 48 or 6 by 2 three times

var_dump($x << $y); // returns 48
echo "<br />";

// $x >> $y shift
//110 or 6
//discarding $y bits from $x
//1,1 and 0 will be discarded, leaving $x without bits or 0

var_dump($x >> $y); // returns 0
echo "<br />";

// $x >> $y shift when $y is 1
//110 or 6
//discarding $y bits from $x
//0 will be discarded, leaving $x with 2 bits - 11 or 011 or 3 which is 6 divided by 2 one time


//Array Operators

$x = ['a' , 'b', 'c'];
$y = ['d', 'e', 'f'];

$z = $x + $y; // adds only the elements from $y to $x on non-existent indexes - in this case the $z returns the same $x

$y = ['d', 'e', 'f','g','h'];

$z = $x + $y; //adds g and h to $x

$z = $x === $y; //return true only if the key value pairs are the same

$z = $x == $y; //
