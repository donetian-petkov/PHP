<?php

error_reporting(E_ALL & ~E_WARNING); //everything is reported except for the Warnings

//https://www.php.net/manual/en/errorfunc.constants.php

trigger_error('Example Error', E_USER_WARNING); //we can trigger errors,warnings,notices - E_USER_ERROR

echo 1; //this won't be printed if an error is triggered, since we trigger a Warning the 1 is echoed
echo "<br />";

function errorHandler(int $type, string $message, ?string $file = null, ?int $line = null) {
    
    echo $type . ": " . $message . ' in ' . $file . ' on line ' . $line;

    exit;
}

set_error_handler('errorHandler', E_ALL); //sets the errorHandler for the errors on the file, overrides error_reporting

//since the error_handler was not set before the trigger_error the Warning in the beginning is not handled by that errorHandler

echo $x;