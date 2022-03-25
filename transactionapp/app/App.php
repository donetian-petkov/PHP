<?php

declare(strict_types=1);

function getTransactionalFiles(string $dirPath): array {

    $files = [];

    //we scan the provided folder to get all of the files inside it and store it in the $files array
    // we do not include any directories

    foreach(scandir($dirPath) as $file) {

        if(is_dir($file)){
            continue;
        }

        $files[] = $dirPath . $file; // add / push the file to the $files array

    }

    return $files;

};

function getTransactions(string $fileName, ?callable $transactionHandler = null): array {

    if(! file_exists($fileName)){
       trigger_error('File ' . $fileName . ' does not exist!', E_USER_ERROR);
    }

    $file = fopen($fileName, 'r');

    fgetcsv($file); //we get the first line of the file and we discard it as it is not actually containing any transaction data

    $transactions = [];

    //we loop over each line in the sample_1.csv file and we store each line in the transaction array
    while (($transaction = fgetcsv($file)) !== false){

        //we set a custom callback function on the getTransactions,
        // so that in the future we may use another function other than the extractTransaction
        // which new function can better suite the file we are extracting

        if ($transactionHandler !== null) {
            $transaction = $transactionHandler($transaction);
        }

        $transactions[] = $transaction;

    }

    return $transactions;

}

function extractTransaction(array $transactionRow): array {

    // through the extractTransaction we extract the information from the csv file
    // and we store that information as associative array

    [$date, $checkNumber, $description, $amount] = $transactionRow;

    $amount = (float) str_replace(['$', ','], '', $amount);

    return [
        'date' => $date,
        'checkNumber' => $checkNumber,
        'description' => $description,
        'amount' => $amount
    ];

}

function calculateTotals(array $transactions): array {

    $totals = ['netTotal' => 0, 'totalIncome' => 0, 'totalExpense' => 0];

    foreach ($transactions as $transaction) {

        $totals['netTotal'] += $transaction['amount'];

        if ($transaction['amount'] >= 0) {

            $totals['totalIncome'] += $transaction['amount'];

        } else {

            $totals['totalExpense'] += $transaction['amount'];

        }

    }

    return $totals;

}