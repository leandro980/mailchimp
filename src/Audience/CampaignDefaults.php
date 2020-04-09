<?php
/**
 * Project: szopen\mailchimp
 *
 * Author: Leandro Luccerini <leandro.luccerini@gmail.com>
 * Created: 08/04/2020 15:27
 */

namespace Szopen\Mailchimp\Audience;

use Egulias\EmailValidator\EmailValidator;
use Egulias\EmailValidator\Validation\RFCValidation;
use Szopen\Mailchimp\Helper\JsonSerialiazerTrait;

/**
 * Class CampaignDefaults
 *
 * @package Szopen\Mailchimp\Audience
 *
 * @see https://mailchimp.com/developer/reference/lists/#Campaign%20Defaults
 */
class CampaignDefaults implements \JsonSerializable
{
    use JsonSerialiazerTrait;

    /**
     * The default from name for campaigns sent to this list.
     *
     * @var string
     */
    protected $fromName;

    /**
     * The default from email for campaigns sent to this list.
     *
     * @var string
     */
    protected $fromEmail;

    /**
     * The default subject line for campaigns sent to this list.
     *
     * @var string
     */
    protected $subject;

    /**
     * The default language for this lists's forms.
     *
     * @var string
     */
    protected $language;

    /**
     * The default from name for campaigns sent to this list.
     *
     * @return string
     */
    public function getFromName(): string
    {
        return $this->fromName;
    }

    /**
     * @param string $fromName
     *
     * @return CampaignDefaults
     */
    public function setFromName(string $fromName): CampaignDefaults
    {
        $this->fromName = $fromName;
        return $this;
    }

    /**
     * The default from email for campaigns sent to this list.
     *
     * @return string
     */
    public function getFromEmail(): string
    {
        return $this->fromEmail;
    }

    /**
     * @param string $fromEmail
     *
     * @return CampaignDefaults
     *
     * @throws \InvalidArgumentException
     */
    public function setFromEmail(string $fromEmail): CampaignDefaults
    {
        $validator = new EmailValidator();

        if(!$validator->isValid($fromEmail, new RFCValidation())){
            throw new \InvalidArgumentException("$fromEmail is not a valid email");
        }

        $this->fromEmail = $fromEmail;
        return $this;
    }

    /**
     * The default subject line for campaigns sent to this list.
     *
     * @return string
     */
    public function getSubject(): string
    {
        return $this->subject;
    }

    /**
     * @param string $subject
     *
     * @return CampaignDefaults
     */
    public function setSubject(string $subject): CampaignDefaults
    {
        $this->subject = $subject;
        return $this;
    }

    /**
     * The default language for this lists's forms.
     *
     * @return string
     */
    public function getLanguage(): string
    {
        return $this->language;
    }

    /**
     * @param string $language
     *
     * @return CampaignDefaults
     */
    public function setLanguage(string $language): CampaignDefaults
    {
        $this->language = $language;
        return $this;
    }

}