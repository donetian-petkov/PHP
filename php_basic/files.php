<?php

//lists files and folders in a directory

$dir = scandir(__DIR__); //returns an array with the files and folders, __DIR__ refers to the current directory


var_dump($dir);

echo "<br />";

echo is_file($dir[2]) . "<br />"; //returns 1 if true, empty string if false

echo is_dir($dir[2]) . "<br />";

//mkdir(name, permissions, recursive)

mkdir('foo');

echo is_dir('foo') . "<br />";

rmdir('foo'); //removes an empty folder

mkdir('foo/bar', recursive: true); // creates both foo and bar

echo is_dir('foo/bar') . "<br />";

echo file_exists('files.php') . "<br />"; //checks if the file exists

echo filesize('files.php') . "<br />"; //  It returns the size of a file in bytes on success and False on failure.

file_put_contents('test.txt', 'hello  world'); //it wii append hello world to the file

echo file_get_contents('test.txt') . "<br />"; //get the content of the file, can be assigned to a variable

echo filesize('test.txt') . "<br />";

file_put_contents('test.txt', 'hello world this is me') . "<br />"; //it wii replace hello world with hello world this is me

echo filesize('test.txt') . "<br />"; //this will return the same value as the previous filesize - why? because the value was cached by the function

clearstatcache();

echo filesize('test.txt') . "<br />"; //this time we will get the new size

$file = fopen('foo.txt', 'r'); //returns a reference to a resource (file, stream, etc), the r is the permission mode - read, write, execute

//@fopen will suppress the error if the file does not exist - do not do that - check if the file exist in an if statement and then execute fopen

//loop through the lines of a file

while(($line = fgets($file)) !== false) {
    echo $line . "<br />";
}

fclose($file); // we must close the file after the execution of the program or after we are done with the file
//however if we want to use the file again we must open it again


//read csv files

$file = fopen('test.csv', 'r');

while (($line = fgetcsv($file)) !== false) {
    print_r($line);
}

fclose($file);

echo "<br />";

//file_get_contents - apart from the file path we can give the offset and the length of the returned value

echo file_get_contents('test.txt', offset: 6, length: 5); //returns the 5 characters from the 7th position of the string - Hello World - > World

echo "<br />";

//file_put_contents - it creates the file if it does not exist, also we can tell it to either replace or append the new value to the file
//returns the number of bytes that were written to the file, or false on failure

echo file_put_contents('testing.txt', 'this is a test'); //returns the size of the file

echo "<br />";

file_put_contents('testing.txt', ' I will add this to the file', FILE_APPEND);

echo file_get_contents('testing.txt');

echo "<br />";

//remove files

unlink('testing.txt');

//copy files

copy('test.txt','new_test.txt'); //if the file already exists the copy will override it

echo file_get_contents('test.txt') . "<br />";
echo file_get_contents('new_test.txt') . "<br />";

//rename / move files and directories

rename('new_test.txt','new_new_test.txt');

if ( ! file_exists('new_test.txt')) {
    echo 'File has been renamed' . "<br />";
    echo file_get_contents('new_new_test.txt') . "<br />";
}

//get information of file

print_r(pathinfo('new_new_test.txt')); //returns an array with the information

