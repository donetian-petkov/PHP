<?php

declare(strict_types=1);

//the class is the blueprint and the object is the instance


class Transaction
{

    //the recommended way is to have one class per file and the class name should match the name of the file

    private float $amount; //property
    private string $description; //only available in the class
    private bool $isPaid = false; //we can set values, but not complex expressions

    //constructor
    public function __construct(float $amount, string $description, bool $isPaid)
    {
        $this->amount = $amount;
        $this->description = $description;
        $this->isPaid = $isPaid;

    }

    public function addTax(float $rate): Transaction
    {
        $this->amount += $this->amount * $rate / 100;

        return $this;
    }

    public function applyDiscount(float $rate): Transaction
    {
        $this->amount -= $this->amount * $rate / 100;
        return $this;
    }

    //getter for the $amount private property
    public function getAmount(): float
    {
        return $this->amount;
    }

    //the destruct function is called when there are no more references to the object or the object is destroyed

    public function __destruct()
    {
        echo 'Destruct ' . $this->description . '<br />';
    }

}