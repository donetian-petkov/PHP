<?php

// require_once '../foo/bar/Test.php';
// require_once '../bar/foo/Test.php';
// this will give out Fatal Error - the name is already in use

// if we declare / define a function or a constant with the same name twice in two different files, which are included / required in the PHP Program
// the same Fatal Error will occur

// this is why to fix the issue we may use namespaces - virtual directory structure for the classes
// !!! the namespace should be set after any declare and before any code !!!
// we still need to include / require the file of the class, however
// from now on when we want to initilize or use the class we would need to use its namespace directory - > Example\Test()

// the recommended way is to define the namespace after the real file path / folder structure
// we have Test class in ThirdClassDir/ThirdClass.php as well so the namespace would be ThirdClassDir\ThirdClass
// and so we can call Test() from there - ThirdClassDir\ThirdClass\Test
// this is why it is important for classes and their files to have the same name - if I had used Test.php instead of ThirdClass.php
// I could have called the Test class like this ThirdClassDir\Test()

// if we have two classes in the same namespace we can call the second class in the first class without any issues

// we can not call classes in the global scope within a file, which uses a namespace, without any modifications
// PHP tries to get the class from the locally defined namespace
// ClassReferenceImpl: DateTime \Example\DateTime - when we try use DateTime()
// to fix this we can set a backspace in front of the global entity - \DateTime()
// https://www.php.net/manual/en/language.namespaces.rules.php
// the functions, however, can be called without any issues. Still, if we have a function which is locally defined within the scope of the class
// but we want to call another function with the same name found in the global scope we need to add \ to the global function as well - \explode()

// each file where we want to use a class defined in namespace has to have that namespace defined there - the included files won't inherit the namespace of the parent

// finally we can use curly brackets to import several classes within the same namespace directory just like JS -
// use FirstDirectory\SecondDirectory\{FirstClass,SecondClass}

declare(strict_types=1);

namespace Example;

use ThirdClassDir\ThirdClass\Test as NewTest; // aliasing

class Test {

    public function __construct() {
        var_dump(new \DateTime());
        var_dump(new NewTest());
        echo explode(' ', 'Hello World Doni');
        echo \explode(' ', 'Hello World Doni');

    }

    public function explode(string $useless, string $text) {
        echo $text;
    }

}