<?php
/**
 * Project: mailchimp
 * User: Leandro Luccerini <leandro.luccerini@gmail.com>
 * Date: 24/04/20
 * Time: 14:16
 */

namespace Szopen\Mailchimp\Audience\Member\MergeFields;


class Options
{
    const FORMAT_PHONE_US = 'US',
          FORMAT_PHONE_INTERNATIONAL = '';

    const FORMAT_BIRTHDAY_MMDD = 'MM/DD',
          FORMAT_BIRTHDAY_DDMM = 'DD/MM';

    /**
     * In an address field, the default country code if none supplied.
     *
     * @var int
     */
    private $defaultCountry;

    /**
     * In a phone field, the phone number type: US or International.
     *
     * @var string
     */
    private $phoneFormat;

    /**
     * In a date or birthday field, the format of the date.
     *
     * @var string
     */
    private $dateFormat;

    /**
     * In a radio or dropdown non-group field, the available options for members to pick from.
     *
     * @var string[]
     */
    private $choices;

    /**
     * In a text field, the default length of the text field.
     *
     * @var int
     */
    private $size;

    /**
     * In an address field, the default country code if none supplied.
     *
     * @return int
     */
    public function getDefaultCountry(): int
    {
        return $this->defaultCountry;
    }

    /**
     * @param int $defaultCountry
     *
     * @return Options
     */
    public function setDefaultCountry(int $defaultCountry): Options
    {
        $this->defaultCountry = $defaultCountry;
        return $this;
    }

    /**
     * In a phone field, the phone number type: US or International.
     *
     * @return string
     */
    public function getPhoneFormat(): string
    {
        return $this->phoneFormat;
    }

    /**
     * @param string $phoneFormat
     *
     * @return Options
     */
    public function setPhoneFormat(string $phoneFormat): Options
    {
        $this->phoneFormat = $phoneFormat;
        return $this;
    }

    /**
     * In a date or birthday field, the format of the date.
     *
     * @return string
     */
    public function getDateFormat(): string
    {
        return $this->dateFormat;
    }

    /**
     * @param string $dateFormat
     *
     * @return Options
     */
    public function setDateFormat(string $dateFormat): Options
    {
        $this->dateFormat = $dateFormat;
        return $this;
    }

    /**
     * In a radio or dropdown non-group field, the available options for members to pick from.
     *
     * @return string[]
     */
    public function getChoices(): array
    {
        return $this->choices;
    }

    /**
     * @param string[] $choices
     *
     * @return Options
     */
    public function setChoices(array $choices): Options
    {
        $this->choices = $choices;
        return $this;
    }

    /**
     * In a text field, the default length of the text field.
     *
     * @return int
     */
    public function getSize(): int
    {
        return $this->size;
    }

    /**
     * @param int $size
     *
     * @return Options
     */
    public function setSize(int $size): Options
    {
        $this->size = $size;
        return $this;
    }
}