<?php

$paymentStatus = 'paid';

match($paymentStatus) {

    'paid' => print 'Paid',
    'declined' => print 'Declined',
    'pending' => print 'Pending'

};

//match can be assigned to a variable:

$paymentStatusDisplay = match($paymentStatus) {

    'paid' => print 'Paid',
    'declined' => print 'Declined',
    'pending' => print 'Pending'

};

//match does not need breaks, but we can chain several conditions:

match($paymentStatus) {

    'paid' => print 'Paid',
    'declined','rejected' => print 'Declined',
    'pending' => print 'Pending'

};

//match does not have a default statement, which means that if the condition is not matched
//this will trigger an error

match($paymentStatus) {

    'paid' => print 'Paid',
    'declined' => print 'Declined',
    'pending' => print 'Pending',

    default => 'Unknown Payment Status'
};

//match does a strict comparison vs switch which makes a loose comparison
//match also do not support multiple statements