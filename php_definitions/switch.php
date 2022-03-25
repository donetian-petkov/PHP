<?php

$paymentStatus = 'paid';

switch($paymentStatus) {

    case 'paid':
        echo "Paid";
        break;

    case 'rejected': //we can output the same code for similar situations
    case 'declined':
        echo "Payment Declined";
        break;

    case "pending":
        echo "Pending";
        break;

    default:
        echo "Unknown Payment Status";
}

// the comparison statements in the if-else are executed until the condition is met
// in the switch statement the condition is executed only once