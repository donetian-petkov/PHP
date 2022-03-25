<?php

// array_chunk($array, int $length, bool $preserveKeys = false): array - chunks the array in smaller chunks

function printArray(array $value) {

    echo '<pre>';

    print_r($value);

    echo '</pre>';
}

$items = ['a' => 1, 'b' => 2, 'c' => 3, 'd' => 4, 'e' => 5];

printArray(array_chunk($items, 2)); //we split the array and create new arrays with 2 elements each;

//if we do array_chunk($items, 2, true) the keys - a, b, c, d, e - will be preserved in the new arrays

//array_combine(array $keys, array $values): array - combines two arrays in key-value pairs, the length of the arrays have to match

$items2 = ['a' , 'b', 'c', 'd'];
$items3 = [1 , 2 , 3, 4];

printArray(array_combine($items2, $items3)); // a: 1, b: 2, c: 3, d: 4

//if the size does not match, array_combine will through an error

//array_filter(array $array, callable|null $callback=null, int $mode=0): array - calls the callback function for each element and if the return is true, the element is included in the new array

$array = [1 , 2 , 3 , 4, 5, 6];

$even = array_filter($array, fn($number) => $number%2 === 0 );

printArray($even);

//we can specify as a third argument if the key or the value or both should be passed to the callback function
// array_filter($array, fn($key, $number) => $array[$key] > $key, ARRAY_FILTER_USE_BOTH); //you can use ARRAY_FILTER_USE_KEY - only for key

//iterating through filtered array:

$even = array_values($even); //this will properly index the elements in the filtered array, removing any spaces in the keys

//if we do not provide a callback function array_filter will return an array with only the truthsy values

//array_keys(array $keys, mixed $search_value, bool $strict = false) : array

$array = ['a' => 5, 'b' => 10, 'c' => 15, 'd' => 10];

$keys = array_keys($array, 10); //we can get the elements, which have a specific value as a key

//array_map(callable|null $callback, array $array, array ...$arrays): array - applies the callback function to each elements of the array

$array = [1, 2, 3, 4, 5];

$array = array_map(fn($number) => $number *3, $array); // the original keys are kept

$array = ['a' => 1, 'b' => 2, 'c' => 3, 'd' => 4];
$array2 = ['e' => 5, 'f' => 6, 'g' => 7, 'h' => 8];

$array = array_map(fn($number1, $number2) => $number1 * $number2, $array, $array2); // we can pass multiple arrays, however, the new array will have default indexes and the keys will be lost

//if the length of the arrays does match, then the map function will add null elements to the array with less elements to match the length

//$array_merge(array ...$arrays) : array - merge multiple arrays, if the arrays have the same length and numeric keys then the keys will be preserved

$array = [1, 2, 3];
$array2 = [4, 5, 6];
$array3 = [7, 8, 9];

$merged = array_merge($array , $array2, $array3);

//if we have arrays with the same numeric keys, in the new array the keys will be lost and instead new indexes will be set for the values
//if we have arrays with the same string keys, in the new array the value of the element in the last array will overide the value of the element from the previous array

//array_reduce(array $array, callable $callback, mixed $initial_value = null) : mixed - reduce the array to a single value using the callback function

$items = [
    ['price' => 9.99, 'qty' => 3, 'desc' => 'Item 1'],
    ['price' => 19.99, 'qty' => 4, 'desc' => 'Item 2'],
    ['price' => 29.99, 'qty' => 5, 'desc' => 'Item 3'],
    ['price' => 39.99, 'qty' => 6, 'desc' => 'Item 4'],
    ['price' => 49.99, 'qty' => 7, 'desc' => 'Item 5'],
];

$total = array_reduce($items,
    fn($returnValueOfPreviousIteration, $currentElement) => $returnValueOfPreviousIteration + $currentElement['qty'] * $currentElement['price'],
    10); //getting the sum of quantity * price of all elements / items + 10 as initial value for the sum

//array_search(mixed $needle, array $haystack, bool $strict = false): int|string|false - search for the key by given value

$array = ['a', 'b', 'c', 'D', 'E', 'ab', 'bc', 'cd', 'b', 'd'];

$key = array_search('b', $array); // returns the key of the first occurrence, the search is case-sensitive and the functions returns false if key with that value is not found

//we must be careful when checking if the function returns false as it can return 0 if the value is found on the 0 key
//and this is false, thus, in the if condition we must use === strict comparison

//in_array(mixed $needle, array $haystack) - checks if value exists in an array and returns true / false

$doesValueExists = in_array('b', $array); // returns true

//array_diff(array ...$arrays) : array - checks several arrays if the values of the elements from the first array do not exist in the other arrays and returns them

$array = ['a' => 1, 'b' => 2, 'c' => 3, 'd' => 4, 'this should be printed' => 10, 'this also should be printed' => 20];
$array2 = ['e' => 5, 'f' => 6, 'g' => 7, 'h' => 8];
$array3 = ['l' => 1, 'b' => 99999, 'n' => 3, 'p' => 4]; //b will also be printed since its value in array3 is different

printArray(array_diff($array, $array2, $array3));

//array_diff_assoc(array ...$arrays) : array - checks several arrays if there are value-key pairs in the first array which do not exist in the other arrays and returns them
//array_diff_key(array ...$arrays) : array - checks several arrays if there are keys in the first arrays which do not exist in the other arrays and returns them

//asort(array $array) - sort an array by values;
//ksort(array $array) - sort an array by keys;
//they both modify the array and return true or false;

$array = ['a' => 3, 'b' => 1, 'c' => 4, 'd' => 2];

printArray($array); //3, 1, 4, 2

asort($array);

printArray($array); //1, 2, 3, 4

ksort($array); //a, b, c, d

printArray($array);

//usort(array $array, callable $callback) - sorts an array with a callback function, removes custom keys and sets numeric keys instead, sorts by value

usort($array,fn($a, $b) => $b <=> $a); //since PHP 8.0 the usort, uasort, uksort functions has to return either -1, 0 or 1 when first element is respectively less than, equal to, or greater than second element.
//this is why we use spaceship operator <=> which does that, since PHP 7.0

printArray($array); //reverse - 4, 3, 2, 1


/**
No.	Function	Sorts by	Key association is maintained
1.	uasort	Value	Yes
2.	uksort	Key	Yes
3.	usort	Value	No
 */

//array destructuring - like JS - we can define specific elements as variables from an array in one line, since PHP 7.1

$array = [1, 2, 3 ,4];

[$a, $b, $c, $d] = $array; //we can also use list($a, $b, $c, $d) = $array;

echo $b; //returns 2
echo "<br />";

[$f, , $e, $g] = $array; //we can skip 2 and set the $f, $e and $g to 1, 3 and 4

echo $e; // returns 3;
echo "<br />";

//destructuring nested arrays:
$array = [1 , 2, [3, 4]];

[$a, $b, [$c, $d]] = $array;

echo $c; //returns 3
echo "<br />";

//destructuring by key

$array = [1, 2, 3, 4];

[1 => $a, 3 => $b, 0 => $c] = $array;

echo $a . ',' . $b . ',' . $c . "<br />"; //$a is 2, $b is 4 and $c is 1

//https://www.php.net/manual/en/ref.array.php
