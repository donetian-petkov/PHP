<?php

require_once 'Animal.php';

// after defining __get and __set

/**
 $cat = new Animal();

$tail = $cat->tail;

echo $tail;
echo "<br />";

$cat->whiskers=25;

echo $cat->whiskers;
echo "<br />";
 */

// after defining __isset, __unset
// we use the above $cat

/**
 var_dump(isset($cat->paws)); // false, we need __get to have been defined in the class

 $cat->paws = 'fluffy'; // we need __set to have been defined in the class

 var_dump(isset($cat->paws)); // true

 unset($cat->paws);

var_dump(isset($cat->paws)); // false

 */

// after defining toString()

/**
$dog = new Animal();

echo $dog; // returns "this is the toString representation of this object - it can be used to give details regarding the object"
 */