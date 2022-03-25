<?php

$name = "Tom";
$age = 35;

echo "There was once a man named $name <br>";
echo "He was $age years old <br>";
echo "He really likes the name $name <br>";
echo "But didn't like being $age <br>";


$string = "This is a test text"; //string
$age = 30; //integer
$price = 3.7; //floating number
$isValid = true; //boolean
$null = null; //no value
echo $string;

//strings
echo "<br>";
echo strtolower($string); //all lower
echo "<br>";
echo strtoupper($string); //all capital
echo "<br>";
echo strlen($string); // length
echo "<br>";
echo $string[0]; //the first letter T
echo "<br>";
echo "Doni"[0]; //the first letter D
echo "<br>";
$string[0] = "B";
echo $string; //Bhis
$string[0] = "T";
echo "<br>";
echo str_replace("This", "That", $string); // replace string - old, new, string
echo "<br>";
echo substr($string, 8, 3); //get the substring starting at 8 position and lasting 3 characters
echo "<br>";

//numbers
echo 40;
echo "<br>";
echo -40;
echo "<br>";
echo 40.7;
echo "<br>";
echo "5 + 9=";
echo 5 + 9;
echo "<br>";
echo 10 % 3; //10 mod 3 = 1
echo "<br>";
echo 4 + 5 * 10; // first * then +
echo "<br>";
echo (4+5) * 10; // first + then *
echo "<br>";
$num = 10;
$num++;//11
echo $num;
echo "<br>";
$num--;//10
echo $num;
echo "<br>";
$num += 25; //35 - you may use *= , /= , -=
echo $num;
echo "<br>";

//math operations
echo abs(-100); //100
echo "<br>";
echo pow(2,4); //2 ^4
echo "<br>";
echo sqrt(144); //12
echo "<br>";
echo max(2,10); // which number is bigger
echo "<br>";
echo min(2,10); //which number is smaller
echo "<br>";
echo round(3.2); //round the number to 3
echo "<br>";
echo round(3.7); //round the number to 4
echo "<br>";
echo floor(3.9); //round the number to 3

//user input

