<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Input</title>
</head>
<body>

<form action="userInput.php" method="get">
    Name:<input type="text" name="name">
    <br>
    Age:<input type="number" name="age">
    <input type="submit">
</form>

Your name is <?php echo $_GET["name"]; ?>
<br>
Your age is <?php echo $_GET["age"]; ?>

</body>
</html>