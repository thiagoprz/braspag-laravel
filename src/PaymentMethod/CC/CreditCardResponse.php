<?php

namespace Thiagoprz\Braspag\PaymentMethod\CC;

class CreditCardResponse
{
    /**
     * @var string
     */
    public $CardNumber;

    /**
     * @var string
     */
    public $Holder;

    /**
     * @var string
     */
    public $ExpirationDate;

    /**
     * @var string
     */
    public $SaveCard;

    /**
     * @var string
     */
    public $CardToken;

    /**
     * @var string
     */
    public $Brand;

    /**
     * @var string
     */
    public $Alias;
}
