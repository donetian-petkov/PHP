<?php

function foo() {
    echo "Hello World";
}

foo();

function bar() {
    return "Hello World";
}

$x = bar();

bar(); //won't print anything
echo $x; // "Hello World"

//functions can be defined at the top, middle or bottom of the file and still be used
//however if we define function inside conditional statement, we have to call the function after the cond statement and when the condition was met
//another exception is function within function - we need to first call the outer function and then we may call the inner function

outer();
inner(); //if we comment outer() the inner() will return error

function outer() {

    echo "outer";
    function inner() {
        echo "inner";
    }

}

// we can not have two functions with the same name


//tell PHP which type of value we expect to be returned, can be used with strict_type

function test(): int {
    return 1;
} // since PHP 7.0

function test2(): void {

} //outputs an error when a value is returned, since PHP 7.1

function test3(): ?int {
    return 1;
} //returns either integer or null, since PHP 7.1

function test4(): int|float {
    return 1;
} //returns either int or float, since PHP 8.0

function test5(): mixed {
    return 1;
} //can return anything, since PHP 7.0, not good to be used