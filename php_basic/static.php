<?php

$x = 5;

include('script1.php');

echo $x; // prints 10 as the x was changed in the script1.php, the x variable has a global scope

//local scope - if we use a variable within a function without the variable being defined within the function this will return error
//even if there is already a variable defined outside of the function, that same variable can not be used within th function
//unless we provide it as an argument to the function

function test1($x) {
    echo $x;
}

test1($x);

//or we use the global keyword

function test2() {
    global $x;

    echo $x;
} //changing the $x within the function changes the $x in the global scope


//GLOBALS associative array - all of the globaly defined variables, not recommended

function test2_5() {
    $GLOBALS['x'] = 10;

    echo $GLOBALS['x']; //returns 10
}


//we can define a variable within the function to use it and it will be only available in the local scope

function test3() {
    $x = 5;

    return $x;
}

//static variable - does not get destroyed after the function is executed

function getValue() {

    static $value = null;

    if ($value == null) {
        $value = calculateValue();
    }

    return $value;

}

function calculateValue() {
    echo "Processing";

    return 10;
} //if we call the getValue() several times, only the first time the calculateValue will be executed, since it is static, something like closure



