<?php

declare(strict_types=1);

$root = dirname(__DIR__) . DIRECTORY_SEPARATOR;

define('APP_PATH', $root . 'app' . DIRECTORY_SEPARATOR);
define('FILES_PATH', $root . 'transaction_files' . DIRECTORY_SEPARATOR);
define('VIEWS_PATH', $root . 'views' . DIRECTORY_SEPARATOR);

require APP_PATH . 'App.php'; //importing the functions set in the App.php
require APP_PATH . 'helpers.php';

$files = getTransactionalFiles(FILES_PATH);

$transactions = [];


//for each file we found in the FILES_PATH we get its lines and store it in the $transactions array
//by merging the $transactions array with the $transactions array returned from getTransactions

foreach ($files as $file) {

    $transactions = array_merge($transactions, getTransactions($file,'extractTransaction'));

}

$totals = calculateTotals($transactions);

require VIEWS_PATH . 'transactions.php'; //when we set the require here, the transactions.php will have a reference to the $transactions array




