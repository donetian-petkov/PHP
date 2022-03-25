<?php

/** Loops */

//while
$i = 0;

while($i < 15) {
    echo $i++;
}

echo "<br />";

//break statement

$x = 0;

while(true) {

    if ($x > 15){
        break;
    }

    while($x > 10){
        break 2; // breaks this while + the while above it
    }

    echo $x++;
}

echo "<br />";

//do-while

$y = 0;

do {
    echo $y++;
} while ($y < 15);

echo "<br />";

//for

for ($i = 0; $i < 15 ; $i++) {
    echo $i;
};

echo "<br />";

for ($i = 0; $i < 15 ; print $i , $i++){

    //prints $i in each iteration - 01234567891011121314
};

echo "<br />";

for ($i = 0; print $i , $i < 15 ; $i++){

    //prints $i in each iteration and even though the cycle closes in  $i < 15 the print will print out 15 as well
};

echo "<br />";

//if we iterate through strings or arrays it is best to first declare a variable for the length of the string/array and then use that variable in the for cycle

$string = ['Hello', 'World', 'Dunkey'];

$length = count($string);

for ($i = 0; $i < $length; $i++){
    echo $string[$i] . "<br />";
}

//foreach

$array2 = ['test', 'test2', 'test3', 'test4'];

foreach ($array2 as $test) {
    echo $test . "<br />";
}

$array3 = ['a' => 'test1', 'b' => 'test2', 'c' => 'test3'];

foreach ($array3 as $key => $value) {

    echo $key . ": " . $value . "<br />";

}

//we may use variables as iterated items - foreach ($array2 as $$test) - if we have defined $test prior the foreach it will be used in the cycle

//$value can now be accessed and used outside the cycle, it returns the last iterated value in the array, if it has been set as reference $$value we need to unset it as changing it will change the last element of the array

$array2 = [
    'name' => 'Doni',
    'email' => 'test@abv.bg',
    'skills' => ['php' , 'js', 'html']
];

//if we iterate $array2 with the above skills array and try to echo the $value it will return a notice that the array could not be converted to string
//here is how to resolve that issue

foreach ($array2 as $key => $value) {

    echo $key . ": " . json_decode($value) . "<br >";

}


