<?php
/**
 * Project: szopen\mailchimp
 *
 * Author: Leandro Luccerini <leandro.luccerini@gmail.com>
 * Created: 08/04/2020 12:27
 */

namespace Szopen\Mailchimp\Audience;

use libphonenumber\NumberParseException;
use Szopen\Mailchimp\Helper\JsonSerialiazerTrait;

/**
 * Class Contact
 *
 * @package Szopen\Mailchimp\Audience
 *
 * @see https://mailchimp.com/developer/reference/lists/#List%20Contact
 */
class Contact implements \JsonSerializable
{

    use JsonSerialiazerTrait;

    /**
     * The company name for the list.
     *
     * @var string
     */
    protected $company;

    /**
     * The street address for the list contact.
     *
     * @var string
     */
    protected $address1;

    /**
     * The street address for the list contact.
     *
     * @var string
     */
    protected $address2;

    /**
     * The city for the list contact.
     *
     * @var string
     */
    protected $city;

    /**
     * The state for the list contact
     *
     * @var string
     */
    protected $state;

    /**
     * The postal or zip code for the list contact.
     *
     * @var string
     */
    protected $zip;

    /**
     * The postal or zip code for the list contact.
     *
     * @var string
     */
    protected $country;

    /**
     * The phone number for the list contact.
     *
     * @var string
     */
    protected $phone;

    /**
     * @return string
     */
    public function getCompany(): string
    {
        return $this->company;
    }

    /**
     * @param string $company
     *
     * @return Contact
     */
    public function setCompany(string $company): Contact
    {
        $this->company = $company;
        return $this;
    }

    /**
     * @return string
     */
    public function getAddress1(): string
    {
        return $this->address1;
    }

    /**
     * @param string $address1
     *
     * @return Contact
     */
    public function setAddress1(string $address1): Contact
    {
        $this->address1 = $address1;
        return $this;
    }

    /**
     * @return string
     */
    public function getAddress2(): string
    {
        return $this->address2;
    }

    /**
     * @param string $address2
     *
     * @return Contact
     */
    public function setAddress2(string $address2): Contact
    {
        $this->address2 = $address2;
        return $this;
    }

    /**
     * @return string
     */
    public function getCity(): string
    {
        return $this->city;
    }

    /**
     * @param string $city
     *
     * @return Contact
     */
    public function setCity(string $city): Contact
    {
        $this->city = $city;
        return $this;
    }

    /**
     * @return string
     */
    public function getState(): string
    {
        return $this->state;
    }

    /**
     * @param string $state
     *
     * @return Contact
     */
    public function setState(string $state): Contact
    {
        $this->state = $state;
        return $this;
    }

    /**
     * @return string
     */
    public function getZip(): string
    {
        return $this->zip;
    }

    /**
     * @param string $zip
     *
     * @return Contact
     */
    public function setZip(string $zip): Contact
    {
        $this->zip = $zip;
        return $this;
    }

    /**
     * @return string
     */
    public function getCountry(): string
    {
        return $this->country;
    }

    /**
     * @param string $country
     *
     * @return Contact
     */
    public function setCountry(string $country): Contact
    {
        $this->country = $country;
        return $this;
    }

    /**
     * @return string
     */
    public function getPhone(): string
    {
        return $this->phone;
    }

    /**
     * @param string $phone
     *
     * @param string $defaultRegion
     *
     * @return Contact
     * @throws NumberParseException
     */
    public function setPhone(string $phone, string $defaultRegion = 'IT'): Contact
    {
        $validator = \libphonenumber\PhoneNumberUtil::getInstance();
        $number = $validator->parse($phone, $defaultRegion);

        if(!$validator->isValidNumber($number)){
            throw new \InvalidArgumentException("$phone is not a valid phone number");
        }

        $this->phone = $phone;
        return $this;
    }
}