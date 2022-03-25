<?php

//two ways to define array
$array1 = [1 , 2 , 3];
$array2 = array(1, 2, 3);


//you can not access an array element through a negative index
//trying to access an element on non-existent index will return Warning and the result will be null

//check if there is an element on the specific index
var_dump(isset($array1[3])); // returns false
echo "<br />";

//printing arrays
var_dump($array1); // more verbose
echo "<br />";
print_r($array1); //less verbose
echo "<br />";

echo '<pre>'; // more readable way to print out an array
print_r($array1);
echo '</pre>';
echo "<br />";

echo count($array1); //the length of the array
echo "<br />";

//adding , pushes element to an array
$array1[] = 4;
echo '<pre>';
print_r($array1);
echo '</pre>';
echo "<br />";

array_push($array1, 5, 6, 7); //another way to add elements
echo '<pre>';
print_r($array1);
echo '</pre>';
echo "<br />";


//associative array

$array3 = [
    'number1' => 1,
    'number2' => 2,
    'number3' => 3
];
echo '<pre>';
print_r($array3);
echo '</pre>';
echo "<br />";

echo $array3["number1"];
echo "<br />";

$array3["number4"] = 4;
echo $array3["number4"];
echo "<br />";

$num5 = "number5";
$array3[$num5] = 5;
echo $array3["number5"];
echo "<br />";

//multidimensional array

$array4 = [
    'number1' => [
        'value' => 2,
        'type' => 'integer'
    ],
    'number2' => [
        'value' => 2.3,
        'type' => 'float'
    ],
    'sumOfNumbers' => [
        'number3' => [
            'value' => 3,
            'type' => 'integer'
        ],
        'number4' => [
            'value' => 4,
            'type' => 'integer'
        ],
        'sum' => 3 + 4
    ]
];

echo $array4['number1']['type'];
echo "<br />";

$array5 = [true => 'a', 1 => 'b', '1' => 'c', 1.8 => 'd'];
echo $array5[1]; //returns d as the 1.8 was the last defined element and PHP casts the 1.8 to int - > 1
echo "<br />";
print_r($array5); //will return only d as 1) bool is not valid key and only 1 was set, then it was overriden
echo "<br />";

$array6 = ['a', 'b', 50 => 'c', 'd', 'e'];
print_r($array6); //this will print 0 - > a, 1 - > b, 50 -> c, 51 -> d, 52 -> e
echo "<br />";

$array7 = ['a', 'b', "test" => 'c', 'd', 'e'];
echo "<pre>";
print_r($array7); //this will print 0 - > a, 1 - > b, test -> c, 2 -> d, 3 -> e
echo "</pre>";
echo "<br />";

//remove elements from array

echo array_pop($array7); //removes the last element
echo "<pre>";
print_r($array7); //this will print 0 - > a, 1 - > b, test -> c, 2 -> d
echo "</pre>";
echo "<br />";

echo array_shift($array7); //removes the first element
echo "<pre>";
print_r($array7); //this will print 0 - > b, test -> c, 1 -> d
echo "</pre>";
echo "<br />";

//destroying array
unset($array7);

unset($array6[0]); //removes a, but does not reindex the array
//if we remove all of the elements through unset, the index of any new elements will be the last int index + 1

//check if key exists in array
$array8 = ['a' => 1, 'b' => 2, 'c' => 3, 'd' => null];
var_dump(array_key_exists('c', $array8));
var_dump(isset($array8['c'])); //same results as array_key_exists

echo "<br />";

var_dump(array_key_exists('d', $array8)); //the key exists, thus true
var_dump(isset($array8['d'])); //the key exists, however, its value is null, thus false



