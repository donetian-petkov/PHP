<?php

declare (strict_types=1);

class Order
{

    // constructor property promotion - property definition + property assignment directly as arguments to the constructor - since PHP 8.0
    // we can "promote" certain properties and leave the others just as they are in the regular way
    // we can "promote" callable properties, which by default can not be defined as a property to a class, however we can not set their visibility
    // we can "promote" properties without types

    private string $buyer;

    public function __construct(
        private float  $amount,
        private string $description,
        string         $buyer,
        callable       $send,
        private        $seller = "Doni"
    )
    {
        $this->buyer = $buyer;
    }

    // nullsafe operators - allows to chain properties and methods even if one returns null
    // order->customer?->paymentProfile?->id; == object of Order -> ?object of Customer - > object of PaymentProfile - > the id property in the PaymentProfile
    // if the customer exists we will continue with our chain, otherwise the execution will not give an error and everything after the left operator will be discarded
    // we can even add ?? for a default value - order->customer?->paymentProfile?->id ?? 1
    // the nullsafe operators sets readonly on the objects / methods / properties - we can not change them
    // https://stitcher.io/blog/php-8-nullsafe-operator


    // -> - this is called object operator
    // ?? - this is called null coalescing operator
}