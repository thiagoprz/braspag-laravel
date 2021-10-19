<?php

namespace Thiagoprz\Braspag\PaymentMethod\CC;

class TokenizeResponse
{
    public $Payment;
    public $ServiceTaxAmount;
    public $Installments;
    public $Interest;
    public $Capture;
    public $Authenticate;
    public $Recurrent;

    /**
     * @var CreditCardResponse
     */
    public $CreditCard;

    public $ProofOfSale;
    public $AcquirerTransactionId;
    public $AuthorizationCode;
    public $PaymentId;
    public $Type;
    public $Amount;
    public $ReceivedDate;
    public $Currency;
    public $Country;
    public $Provider;
    public $ReasonCode;
    public $ReasonMessage;
    public $Status;
    public $ProviderReturnCode;
    public $ProviderReturnMessage;
}
