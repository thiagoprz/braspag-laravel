<?php

namespace Thiagoprz\Braspag\PaymentMethod\CC;

class Card implements \JsonSerializable
{
    protected $CardNumber;
    protected $Holder;
    protected $ExpirationDate;
    protected $SecurityCode;
    protected $Brand;
    protected $SaveCard = false;
    protected $Alias;

    /**
     * @return mixed
     */
    public function getCardNumber()
    {
        return $this->CardNumber;
    }

    /**
     * @param mixed $CardNumber
     */
    public function setCardNumber($CardNumber): void
    {
        $this->CardNumber = str_replace([' ', '-', '.', '/'], '', $CardNumber);
    }

    /**
     * @return mixed
     */
    public function getHolder()
    {
        return $this->Holder;
    }

    /**
     * @param mixed $Holder
     */
    public function setHolder($Holder): void
    {
        $this->Holder = $Holder;
    }

    /**
     * @return mixed
     */
    public function getExpirationDate()
    {
        return $this->ExpirationDate;
    }

    /**
     * @param mixed $ExpirationDate
     */
    public function setExpirationDate($ExpirationDate): void
    {
        $this->ExpirationDate = $ExpirationDate;
    }

    /**
     * @return mixed
     */
    public function getSecurityCode()
    {
        return $this->SecurityCode;
    }

    /**
     * @param mixed $SecurityCode
     */
    public function setSecurityCode($SecurityCode): void
    {
        $this->SecurityCode = $SecurityCode;
    }

    /**
     * @return mixed
     */
    public function getBrand()
    {
        return $this->Brand;
    }

    /**
     * @param mixed $Brand
     */
    public function setBrand($Brand): void
    {
        $this->Brand = $Brand;
    }

    /**
     * @return bool
     */
    public function isSaveCard(): bool
    {
        return $this->SaveCard;
    }

    /**
     * @param bool $SaveCard
     */
    public function setSaveCard(bool $SaveCard): void
    {
        $this->SaveCard = $SaveCard;
    }

    /**
     * @return mixed
     */
    public function getAlias()
    {
        return $this->Alias;
    }

    /**
     * @param mixed $Alias
     */
    public function setAlias($Alias): void
    {
        $this->Alias = $Alias;
    }

    /**
     * @return array|mixed
     */
    public function jsonSerialize()
    {
        return array_filter(get_object_vars($this));
    }
}
