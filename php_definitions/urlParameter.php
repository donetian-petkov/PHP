<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>URL Parameter</title>
</head>
<body>

<form action="urlParameter.php" method="get">

    Name: <input type="text" name="name"> <br>
    <input type="submit">
</form>
<br><br>

<?php

echo $_GET["age"];


//https://www.donetianpetkov.com/php_tests/urlParameter.php?name=Mike
//?name=Mike - urlParameter, from GET request

//https://www.donetianpetkov.com/php_tests/urlParameter.php?name=Mike&age=70

?>

</body>
</html>