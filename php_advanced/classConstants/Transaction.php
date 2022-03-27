<?php

declare(strict_types = 1);

class Transaction
{
    public const STATUS_PAID = 'paid';
    public const STATUS_PENDING = 'pending';
    public const STATUS_DECLINED = 'declined';
    private const STATUS_INITIAL = 'initial';

    private string $status;

    public const ALL_STATUSES = [
      self::STATUS_PAID => 'Paid',
      self::STATUS_PENDING => 'Pending',
      self::STATUS_DECLINED => 'Declined'
    ];

    public function __construct() {

        // we can get a const in two ways:
        // echo Transaction::STATUS_INITIAL;
        // echo "<br />";
        // or
        // echo self::STATUS_INITIAL; // self vs $this - self refers to the class and $this refers to the object
        // echo "<br />";

        $this->setStatus(self::STATUS_INITIAL);

    }

    public function setStatus(string $status): self
    {
        $this->status = $status;

        return $this;
    }
    
}