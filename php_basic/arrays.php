<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Arrays</title>
</head>
<body>

<?php

$friends = array("Kevin", 1, "Karen", false, "Oscar", "Jim");

echo $friends[1];

$friends[1] = "Dwight";

echo $friends[1];

$friends[4] = "Angela";

echo $friends[4];

echo count($friends);

?>


</body>
</html>