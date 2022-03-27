<?php

require_once 'Transaction.php';

// getting the class constants, the double colon is called "scope resolution operator"

echo Transaction::STATUS_PAID; // we do not need the instance of the class to get the constants
echo "<br />";

$transaction = new Transaction();

echo $transaction::STATUS_PENDING; // however, we may also get the constants through an instance of the class
echo "<br />";

echo $transaction::class; // a default const which prints the fully qualified name of the class, only allowed since PHP 8.0

$transaction->setStatus(Transaction::STATUS_PAID);