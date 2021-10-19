<?php

namespace Thiagoprz\Braspag\Sale;

use Thiagoprz\Braspag\Http\Client;

class Sale implements \JsonSerializable
{

    /**
     * ID do pedido na loja
     *
     * @var string
     */
    protected $MerchantOrderId;

    /**
     * @var Customer
     */
    protected $Customer;

    /**
     * @var \Thiagoprz\Braspag\PaymentMethod\CreditCard
     */
    protected $Payment;

    /**
     * @return array|mixed
     */
    public function jsonSerialize()
    {
        return array_filter(get_object_vars($this));
    }

    /**
     * @return string
     */
    public function getMerchantOrderId(): string
    {
        return $this->MerchantOrderId;
    }

    /**
     * @param string $MerchantOrderId
     */
    public function setMerchantOrderId(string $MerchantOrderId): void
    {
        $this->MerchantOrderId = $MerchantOrderId;
    }

    /**
     * @return \Thiagoprz\Braspag\PaymentMethod\CreditCard
     */
    public function getPayment(): \Thiagoprz\Braspag\PaymentMethod\CreditCard
    {
        return $this->Payment;
    }

    /**
     * @param \Thiagoprz\Braspag\PaymentMethod\CreditCard $Payment
     */
    public function setPayment(\Thiagoprz\Braspag\PaymentMethod\CreditCard $Payment): void
    {
        $this->Payment = $Payment;
        $this->Payment->setSoftDescriptor(config('braspag.softDescriptor'));
    }

    /**
     * @return Customer
     */
    public function getCustomer(): Customer
    {
        return $this->Customer;
    }

    /**
     * @param Customer $Customer
     */
    public function setCustomer(Customer $Customer): void
    {
        $this->Customer = $Customer;
    }
}
