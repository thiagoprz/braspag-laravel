<?php

namespace Thiagoprz\Braspag\Sale\Customer;

class Address implements \JsonSerializable
{
    /**
     * @var string
     */
    protected $Street;

    /**
     * @var int
     */
    protected $Number;

    /**
     * @var string
     */
    protected $District;

    /**
     * @var string
     */
    protected $ZipCode;

    /**
     * @var string
     */
    protected $Complement;

    /**
     * @var string
     */
    protected $City;

    /**
     * @var string
     */
    protected $State;

    /**
     * @var string
     */
    protected $Country;

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
    public function getStreet(): string
    {
        return $this->Street;
    }

    /**
     * @param string $Street
     */
    public function setStreet(string $Street): void
    {
        $this->Street = $Street;
    }

    /**
     * @return int
     */
    public function getNumber(): int
    {
        return $this->Number;
    }

    /**
     * @param int $Number
     */
    public function setNumber(int $Number): void
    {
        $this->Number = $Number;
    }

    /**
     * @return string
     */
    public function getDistrict(): string
    {
        return $this->District;
    }

    /**
     * @param string $District
     */
    public function setDistrict(string $District): void
    {
        $this->District = $District;
    }

    /**
     * @return string
     */
    public function getZipCode(): string
    {
        return $this->ZipCode;
    }

    /**
     * @param string $ZipCode
     */
    public function setZipCode(string $ZipCode): void
    {
        $this->ZipCode = $ZipCode;
    }

    /**
     * @return string
     */
    public function getCity(): string
    {
        return $this->City;
    }

    /**
     * @param string $City
     */
    public function setCity(string $City): void
    {
        $this->City = $City;
    }

    /**
     * @return string
     */
    public function getComplement(): string
    {
        return $this->Complement;
    }

    /**
     * @param string $Complement
     */
    public function setComplement(string $Complement): void
    {
        $this->Complement = $Complement;
    }

    /**
     * @return string
     */
    public function getState(): string
    {
        return $this->State;
    }

    /**
     * @param string $State
     */
    public function setState(string $State): void
    {
        $this->State = $State;
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
}
