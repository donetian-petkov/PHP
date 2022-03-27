<?php

require_once './FirstClass.php';

$transaction = new Transaction(10, 'First Transaction', true);

echo "<pre>";
print_r($transaction); //we can echo an object like we do with an array
echo "</pre>";
echo "<br />";


/**
 * getting and setting a value of a public property
 * var_dump($transaction->amount); //getting the property amount from the FirstClass, we do not add $ in front of it
 * echo "<br />";
 * //setting a value for a property
 * $transaction->amount = 15;
 * echo "<br />";
 */

echo $transaction->getAmount(); //echoing the private amount property of the $transaction object
echo "<br />";

$transaction->addTax(8);
echo $transaction->getAmount();
echo "<br />";

$transaction->applyDiscount(10);
echo $transaction->getAmount();
echo "<br />";

//chaining methods - they should return $this
$transaction->addTax(12)->applyDiscount(10); //the methods will be executed one after the other
echo $transaction->getAmount();
echo "<br />";

//chaining methods right after the declaration of the object

$newTransaction = (new Transaction(100, 'Second Transaction',false))
    ->addTax(10)
    ->applyDiscount(8);

//we can even set a variable with the value of a private property
//our custom destruct function in the Transaction class will be executed after the execution of the following declaration
//this is because the anonymous object (new Transaction) is going to be destroyed
//as there are no other references to it - we set only the value of $amount by the value of the private property

$amount = (new Transaction(100, 'Third Transaction', true))
    ->getAmount();

$amount = $newTransaction->getAmount(); //this will also work;

echo $amount;
echo "<br />";

//another way of creating object - with a variable

$class = 'Transaction';

$thirdTransaction = new $class(100, 'Forth Transaction', false);

echo "<pre>";
print_r($thirdTransaction);
echo "</pre>";
echo "<br />";

//destroying objects manually
//if we have not set the below explicit destruction with unset the following would have been echoed by the program

/**
 * Destruct Forth Transaction
 * Destruct Second Transaction
 * Destruct First Transaction
 */

//but because we explicitly tell the program to destroy the object the order will be

/**
 * Destruct Second Transaction
 * Destruct Forth Transaction
 * Destruct First Transaction
 */

unset($newTransaction);

//setting the object to null also destroy the object:

$transaction = null;

//now the order will be

/**
 * Destruct Second Transaction
 * Destruct First Transaction
 * Destruct Forth Transaction
 */

$str = '{"a":1, "b":2, "c": 3}';

//$arr will be a std object and not an array, the keys will be properties in the $arr object and the values will remmain

//quote:
//stdClass is just a generic 'empty' class that's used when casting other types to objects.
//Despite what the other two answers say, stdClass is not the base class for objects in PHP.

$arr = json_decode($str, true);

var_dump($arr);
echo "<br />";

var_dump($arr->c);

$obj = new \stdClass();

$obj->a = 1;
$obj->b = 2;

var_dump($obj);
echo "<br />";

//casting to objects

$array = [1, 2, 3];
var_dump((object) $array);
echo "<br />";

$obj = (object) $array;

//to access the elements of the $obj we would need to use {}
var_dump($obj->{1});
echo "<br />";

//casting integers to object

var_dump((object) 1); //the property for the 1 is scalar

/**
 * If an object is converted to an object, it is not modified. If a value of any other type is converted to an object,
 * a new instance of the stdClass built-in class is created. If the value was NULL, the new instance will be empty.
 * Arrays convert to an object with properties named by keys, and corresponding values.
 * For any other value, a member variable named scalar will contain the value.
 */
