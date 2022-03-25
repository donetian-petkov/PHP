<?php

//init_set()

var_dump(init_get('error_reporting')); // the representation of the value of error_reporting
var_dump(E_ALL); //the same representation

init_set('error_reporting', E_ALL & E_WARNING); //only valid through the execution of the program

init_set('display_errors', 0); //hides the errors

//error_reporting - what is reported vs display_errors - if anything should be reported

