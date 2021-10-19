<?php

namespace Thiagoprz\Braspag\Sale;

class Customer implements \JsonSerializable
{
    /**
     * @var string
     */
    protected $Name;

    /**
     * @var string
     */
    protected $Email;

    /**
     * @var string
     */
    protected $Birthdate;

    /**
     * @var string
     */
    protected $Identity;

    /**
     * @var string
     */
    protected $IdentityType = 'CPF';

    /**
     * @var string
     */
    protected $IpAddress;

    /**
     * @var Address
     */
    protected $Address;

    /**
     * @var Address
     */
    protected $DeliveryAddress;

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->Name;
    }

    /**
     * @param string $Name
     */
    public function setName(string $Name): void
    {
        $this->Name = $Name;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->Email;
    }

    /**
     * @param string $Email
     */
    public function setEmail(string $Email): void
    {
        $this->Email = $Email;
    }

    /**
     * @return Address
     */
    public function getAddress(): Address
    {
        return $this->Address;
    }

    /**
     * @param Address $Address
     */
    public function setAddress(Address $Address): void
    {
        $this->Address = $Address;
    }

    /**
     * @return Address
     */
    public function getDeliveryAddress(): Address
    {
        return $this->DeliveryAddress;
    }

    /**
     * @param Address $DeliveryAddress
     */
    public function setDeliveryAddress(Address $DeliveryAddress): void
    {
        $this->DeliveryAddress = $DeliveryAddress;
    }

    /**
     * @return string
     */
    public function getBirthdate(): string
    {
        return $this->Birthdate;
    }

    /**
     * @param string $Birthdate
     */
    public function setBirthdate(string $Birthdate): void
    {
        $this->Birthdate = $Birthdate;
    }

    /**
     * @return string
     */
    public function getIdentity(): string
    {
        return $this->Identity;
    }

    /**
     * @param string $Identity
     */
    public function setIdentity(string $Identity): void
    {
        $this->Identity = $Identity;
    }

    /**
     * @return string
     */
    public function getIdentityType(): string
    {
        return $this->IdentityType;
    }

    /**
     * @param string $IdentityType
     */
    public function setIdentityType(string $IdentityType): void
    {
        $this->IdentityType = $IdentityType;
    }

    /**
     * @return array|mixed
     */
    public function jsonSerialize()
    {
        return array_filter(get_object_vars($this));
    }
}
