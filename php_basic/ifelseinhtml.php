<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>If Else In HTML</title>
</head>
<body>

<?php

$score = 95;

?>

<?php if ($score > 90): ?>
<strong>A</strong>
<?php elseif ($score < 90): ?>
<strong>B</strong>
<?php elseif ($score < 80): ?>
<strong>C</strong>
<?php elseif ($score < 70): ?>
<strong>D</strong>
<?php else: ?>
<strong>F</strong>

<?php endif ?>

</body>
</html>