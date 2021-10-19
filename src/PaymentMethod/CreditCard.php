<?php
namespace Thiagoprz\Braspag\PaymentMethod;


use Thiagoprz\Braspag\Http\Client;

class CreditCard implements \JsonSerializable
{
    /**
     * @var string
     */
    protected $Provider;

    /**
     * @var string
     */
    protected $Type = 'Creditcard';

    /**
     * @var int
     */
    protected $Amount;

    /**
     * @var string
     */
    protected $Currency = 'BRL';

    /**
     * @var string
     */
    protected $Country = 'BRA';

    /**
     * @var int
     */
    protected $Installments = 1;

    /**
     * @var string
     */
    protected $Interest = 'ByMerchant';

    /**
     * @var bool
     */
    protected $Capture = true;

    /**
     * @var bool
     */
    protected $Authenticate = false;

    /**
     * @var bool
     */
    protected $Recurrent = false;

    /**
     * @var string
     */
    protected $SoftDescriptor;

    /**
     * @var \Thiagoprz\Braspag\PaymentMethod\CreditCard\Card
     */
    protected $CreditCard;

    /**
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function tokenize()
    {
        $client = Client::getInstance();
        $this->getCreditCard()->setSaveCard(true);
        $this->setRecurrent(false);
        return $client->post(config('v2/sales'), $this);
    }

    /**
     * @return array|mixed
     */
    public function jsonSerialize()
    {
        return array_filter(get_object_vars($this));
    }

    /**
     * @return mixed
     */
    public function getProvider()
    {
        return $this->Provider;
    }

    /**
     * @param mixed $Provider
     */
    public function setProvider($Provider): void
    {
        $this->Provider = $Provider;
    }

    /**
     * @return int
     */
    public function getInstallments(): int
    {
        return $this->Installments;
    }

    /**
     * @param int $Installments
     */
    public function setInstallments(int $Installments): void
    {
        $this->Installments = $Installments;
    }

    /**
     * @return string
     */
    public function getCurrency(): string
    {
        return $this->Currency;
    }

    /**
     * @param string $Currency
     */
    public function setCurrency(string $Currency): void
    {
        $this->Currency = $Currency;
    }

    /**
     * @return string
     */
    public function getSoftDescriptor(): string
    {
        return $this->SoftDescriptor;
    }

    /**
     * @param string $SoftDescriptor
     */
    public function setSoftDescriptor(string $SoftDescriptor): void
    {
        $this->SoftDescriptor = $SoftDescriptor;
    }

    /**
     * @return bool
     */
    public function isAuthenticate(): bool
    {
        return $this->Authenticate;
    }

    /**
     * @param bool $Authenticate
     */
    public function setAuthenticate(bool $Authenticate): void
    {
        $this->Authenticate = $Authenticate;
    }

    /**
     * @return CreditCard\Card
     */
    public function getCreditCard(): CreditCard\Card
    {
        return $this->CreditCard;
    }

    /**
     * @param CreditCard\Card $CreditCard
     */
    public function setCreditCard(CreditCard\Card $CreditCard): void
    {
        $this->CreditCard = $CreditCard;
    }

    /**
     * @return string
     */
    public function getInterest(): string
    {
        return $this->Interest;
    }

    /**
     * @param string $Interest
     */
    public function setInterest(string $Interest): void
    {
        $this->Interest = $Interest;
    }

    /**
     * @return string
     */
    public function getCountry(): string
    {
        return $this->Country;
    }

    /**
     * @param string $Country
     */
    public function setCountry(string $Country): void
    {
        $this->Country = $Country;
    }

    /**
     * @return bool
     */
    public function isRecurrent(): bool
    {
        return $this->Recurrent;
    }

    /**
     * @param bool $Recurrent
     */
    public function setRecurrent(bool $Recurrent): void
    {
        $this->Recurrent = $Recurrent;
    }

    /**
     * @return int
     */
    public function getAmount(): int
    {
        return $this->Amount;
    }

    /**
     * @param int $Amount
     */
    public function setAmount(int $Amount): void
    {
        $this->Amount = $Amount;
    }

    /**
     * @return bool
     */
    public function isCapture(): bool
    {
        return $this->Capture;
    }

    /**
     * @param bool $Capture
     */
    public function setCapture(bool $Capture): void
    {
        $this->Capture = $Capture;
    }
}
