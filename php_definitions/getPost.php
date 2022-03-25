<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Post Form</title>
</head>
<body>

<form action="getPost.php" method="post">

    Password: <input type="password" name="password"> <br>
    <input type="submit">
</form>
<br><br>

<?php

echo $_POST["password"];

?>

</body>
</html>