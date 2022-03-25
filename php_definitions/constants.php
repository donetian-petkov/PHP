<?php

//data that won't be changed

define('STATUS_PAID', 'paid'); //defined at run time

echo STATUS_PAID; //no $ in front of the constant

echo "<br>";

// define('STATUS_PAID','not paid'); //this will throw an error

echo defined('STATUS_PAID'); //check if the constant is defined, returns 1 if true

echo "<br>";

const STATUS_DELIVERED = "delivered"; //defined at compile time, can not be defined inside an if statement

$sent = 'SENT';

define('STATUS_' . $sent, $sent);

echo STATUS_SENT;

echo "<br>";

//predefined constants

echo PHP_VERSION;

echo "<br>";

//magic constants - their value can be changed depending where they are used

echo __LINE__; //the line in which the LINE is used

echo "<br>";

echo __FILE__; //path to the file

echo "<br>";

// variable variables

$foo = "bar";

$$foo = "baz"; // we define bar to be a variable with the value of baz

echo "$foo , $bar";

echo "<br>";

echo "$foo, $($foo)";