<?php
/**
 * Project: mailchimp
 * User: Leandro Luccerini <leandro.luccerini@gmail.com>
 * Date: 23/04/20
 * Time: 15:52
 */

namespace Szopen\Mailchimp\Audience\Member;


use JsonSerializable;
use Szopen\Mailchimp\Helper\JsonSerialiazerTrait;

/**
 * Class Location
 * Subscriber location information.
 *
 * @author Leandro Luccerini <leandro.luccerini@gmail.com>
 * @package Szopen\Mailchimp\Audience\Member
 */
class Location implements JsonSerializable
{
    use JsonSerialiazerTrait;

    /**
     * The location latitude.
     *
     * @var float
     */
    private $latitude;

    /**
     * The location longitude.
     *
     * @var float
     */
    private $longitude;

    /**
     * The time difference in hours from GMT.
     *
     * @var int
     */
    private $gmtoff = 0;

    /**
     * The offset for timezones where daylight saving time is observed.
     *
     * @var int
     */
    private $dstoff;

    /**
     * The unique code for the location country.
     *
     * @var string
     */
    private $countryCode;

    /**
     * The timezone for the location.
     *
     * @var string
     */
    private $timezone;


    /**
     * Location constructor.
     *
     * @param float $latitude
     * @param float $longitude
     */
    public function __construct(float $latitude = null, float $longitude = null)
    {
        $this->allowedVarsToSerialization  = ["latitude", "longitude"];

        $this->latitude = $latitude;
        $this->longitude = $longitude;
    }


    /**
     * The location latitude.
     *
     * @return float|null
     */
    public function getLatitude(): ?float
    {
        return $this->latitude;
    }

    /**
     * @param float|null $latitude
     *
     * @return $this
     */
    public function setLatitude(?float $latitude): Location
    {
        $this->latitude = $latitude;
        return $this;
    }

    /**
     * The location longitude.
     *
     * @return float|null
     */
    public function getLongitude(): ?float
    {
        return $this->longitude;
    }

    /**
     * @param float|null $longitude
     *
     * @return $this
     */
    public function setLongitude(?float $longitude): Location
    {
        $this->longitude = $longitude;
        return $this;
    }

    /**
     * The time difference in hours from GMT.
     *
     * @return int
     */
    public function getGmtoff(): int
    {
        return $this->gmtoff;
    }

    /**
     * The offset for timezones where daylight saving time is observed.
     *
     * @return int
     */
    public function getDstoff(): int
    {
        return $this->dstoff;
    }

    /**
     * The unique code for the location country.
     *
     * @return string
     */
    public function getCountryCode(): string
    {
        return $this->countryCode;
    }

    /**
     * The timezone for the location.
     *
     * @return string
     */
    public function getTimezone(): string
    {
        return $this->timezone;
    }
}