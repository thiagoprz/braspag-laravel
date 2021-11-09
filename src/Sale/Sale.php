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
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function process()
    {
        $client = Client::getInstance();
        return $client->post('v2/sales', $this);
    }

    /**
     * Captura do pagamento
     *
     * @param $PaymentId
     * @param $Amount
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public static function capture($PaymentId, $Amount)
    {
        $client = Client::getInstance();
        return $client->put("v2/sales/$PaymentId/capture?amount=$Amount", []);
    }

    /**
     * Cancelamento do pagamento
     *
     * @param $PaymentId
     * @param $Amount
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function cancel($PaymentId, $Amount)
    {
        $client = Client::getInstance();
        return $client->put("v2/sales/$PaymentId/void?amount=$Amount", $this);
    }

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
     * @param \Thiagoprz\Braspag\PaymentMethod\CreditCard|mixed $Payment
     */
    public function setPayment($Payment): void
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
