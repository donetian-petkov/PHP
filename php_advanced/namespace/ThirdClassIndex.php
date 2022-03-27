<?php

require_once 'ThirdClass.php';
require_once 'ThirdClassDir/ThirdClass.php';

// we have two classes with the same name, however, since there are defined within different namespaces they can be called together

var_dump(new Example\Test());
var_dump(new ThirdClassDir\ThirdClass\Test());

// we can import the namespace so that we won't have to use the full namespace path when using the class

use ThirdClassDir\ThirdClass\Test;

var_dump(new Test());

// however, we won't be able to import another namespace which points to a class with the same name
// use Example\Test - this throws an error that Test is already in use

// this is why we can aliasing -

use Example\Test as NewTest;

var_dump(new NewTest()); // now we can use two classes with the same name defined in two different namespaces
// without having to use the full namespace path when using them