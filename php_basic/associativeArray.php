<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>School</title>
</head>
<body>

<?php

$grades = array("Jim"=>"A+", "Pam"=>"B-","Oscar"=>"C+"); // key - value pairs - "Jim" => "A++"

//keys must be unique

echo $grades["Jim"];

$grades["Jim"] = "F";

?>

</body>
</html>