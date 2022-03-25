<?php

//include vs require - if the file does not exist, the code after the include will still be executed

//adding multiple require of the same file can override and reset the variables from the file

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Post Form</title>
</head>
<body>

<?php

include('form.php');

echo $_POST["password"];

/**
 * if we set ob_start(); before the include and then set a variable which equals ob_get_clean() after the inclde
 * the HTML from the form.php is not going to be displayed on the site - we have to use echo $variable
 * in this way however we can change the HTML provided from the form.php with string functions
 */

?>

</body>
</html>