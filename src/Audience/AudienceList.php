<?php
/**
 * Project: szopen\mailchimp
 *
 * Author: Leandro Luccerini <leandro.luccerini@gmail.com>
 * Created: 08/04/2020 12:19
 */

namespace Szopen\Mailchimp\Audience;

use Egulias\EmailValidator\EmailValidator;
use Egulias\EmailValidator\Validation\RFCValidation;
use Szopen\Mailchimp\Helper\JsonSerialiazerTrait;

/**
 * Class AudienceList
 *
 * @package Szopen\Mailchimp\Audience
 *
 * @see https://mailchimp.com/developer/reference/lists/
 */
class AudienceList implements \JsonSerializable
{

    use JsonSerialiazerTrait;

    const VISIBILITY_PUBLIC = "pub";

    const VISIBILITY_PRIVATE = "prv";

    /**
     * A string that uniquely identifies this list.
     *
     * @var string
     */
    private $id = null;

    /**
     * The ID used in the Mailchimp web application.
     * View this list in your Mailchimp account at https://{dc}.admin.mailchimp.com/lists/members/?id={web_id}.
     *
     * @var int
     */
    private $webId = null;

    /**
     * The name of the list.
     *
     * @var string
     */
    private $name = '';

    /**
     * Contact information displayed in campaign footers to comply with international spam laws.
     *
     * @var Contact
     */
    private $contact = null;

    /**
     * The permission reminder for the list.
     *
     * @var string
     */
    private $permissionReminder = '';

    /**
     * Whether campaigns for this list use the Archive Bar in archives by default.
     *
     * @var bool
     */
    private $useArchiveBar;

    /**
     * Default values for campaigns created for this list.
     *
     * @var CampaignDefaults
     */
    private $campaignDefaults = null;

    /**
     * The email address to send subscribe notifications to.
     *
     * @var string
     */
    private $notifyOnSubscribe;

    /**
     * The email address to send unsubscribe notifications to.
     *
     * @var string
     */
    private $notifyOnUnsubscribe;

    /**
     * Whether the list supports multiple formats for emails.
     * When set to true, subscribers can choose whether they want to receive HTML or plain-text emails.
     * When set to false, subscribers will receive HTML emails, with a plain-text alternative backup.
     *
     * @var bool
     */
    private $emailTypeOption;

    /**
     * Whether this list is public or private.
     * Possible Values:
     * - pub
     * - prv
     *
     * @var string
     */
    private $visibility;

    /**
     * Whether or not to require the subscriber to confirm subscription via email.
     *
     * @var bool
     */
    private $doubleOptin;

    /**
     * Whether or not the list has marketing permissions (eg. GDPR) enabled.
     *
     * @var bool
     */
    private $marketingPermission;

    /**
     * The date and time that this list was created in ISO 8601 format.
     *
     * @var \DateTime
     */
    private $dateCreated;

    /**
     * An auto-generated activity score for the list (0-5).
     *
     * @var int
     */
    private $listRating;

    /**
     * Our EepURL shortened version of this list's subscribe form.
     *
     * @var string
     */
    private $subscribeUrlShort;

    /**
     * The full version of this list's subscribe form (host will vary).
     *
     * @var string
     */
    private $subscribeUrlLong;

    /**
     * The list's Email Beamer address.
     *
     * @see https://mailchimp.com/help/use-email-beamer-to-create-a-campaign/
     *
     * @var string
     */
    private $beamerAddress;

    /**
     * Whether or not this list has a welcome automation connected.
     * Welcome Automations: welcomeSeries, singleWelcome, emailFollowup.
     *
     * @var bool
     */
    private $hasWelcome;

    /**
     * Any list-specific modules installed for this list.
     *
     * @var array
     */
    private $modules;

    /**
     * Stats for the list. Many of these are cached for at least five minutes.
     *
     * @var Stats
     */
    private $stats;

    /**
     * @var Link[]
     */
    private $links = [];

    /**
     * @var EmailValidator
     */
    private $emailValidator;

    /**
     * AudienceList constructor.
     */
    public function __construct()
    {
        $this->emailValidator = new EmailValidator();
        $this->allowedVarsToSerialization  = ["name", "contact", "permissionReminder", "useArchiveBar",
            "campaignDefaults", "notifyOnSubscribe", "notifyOnUnsubscribe", "emailTypeOption",
            "visibility", "doubleOptin", "marketingPermissions"];
    }

    /**
     * The name of the list.
     *
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     *
     * @return AudienceList
     */
    public function setName(string $name): AudienceList
    {
        $this->name = $name;
        return $this;
    }

    /**
     * Contact information displayed in campaign footers to comply with international spam laws.
     *
     * @return null|Contact
     */
    public function getContact(): ?Contact
    {
        return $this->contact;
    }

    /**
     * @param Contact $contact
     *
     * @return AudienceList
     */
    public function setContact(Contact $contact): AudienceList
    {
        $this->contact = $contact;
        return $this;
    }

    /**
     * The permission reminder for the list.
     *
     * @return string
     */
    public function getPermissionReminder(): string
    {
        return $this->permissionReminder;
    }

    /**
     * @param string $permissionReminder
     *
     * @return AudienceList
     */
    public function setPermissionReminder(string $permissionReminder): AudienceList
    {
        $this->permissionReminder = $permissionReminder;
        return $this;
    }

    /**
     * Whether campaigns for this list use the Archive Bar in archives by default.
     *
     * @return bool
     */
    public function isUseArchiveBar(): bool
    {
        return $this->useArchiveBar;
    }

    /**
     * @param bool $useArchiveBar
     *
     * @return AudienceList
     */
    public function setUseArchiveBar(bool $useArchiveBar): AudienceList
    {
        $this->useArchiveBar = $useArchiveBar;
        return $this;
    }

    /**
     * Default values for campaigns created for this list.
     *
     * @return null|CampaignDefaults
     */
    public function getCampaignDefaults(): ?CampaignDefaults
    {
        return $this->campaignDefaults;
    }

    /**
     * @param CampaignDefaults $campaignDefaults
     *
     * @return AudienceList
     */
    public function setCampaignDefaults(CampaignDefaults $campaignDefaults): AudienceList
    {
        $this->campaignDefaults = $campaignDefaults;
        return $this;
    }

    /**
     * The email address to send subscribe notifications to.
     *
     * @return string
     */
    public function getNotifyOnSubscribe(): string
    {
        return $this->notifyOnSubscribe;
    }

    /**
     * @param string $notifyOnSubscribe
     *
     * @return AudienceList
     */
    public function setNotifyOnSubscribe(string $notifyOnSubscribe): AudienceList
    {

        if (!$this->emailValidator->isValid($notifyOnSubscribe, new RFCValidation())) {
            throw new \InvalidArgumentException("$notifyOnSubscribe is not a valid email");
        }

        $this->notifyOnSubscribe = $notifyOnSubscribe;
        return $this;
    }

    /**
     * The email address to send unsubscribe notifications to.
     *
     * @return string
     */
    public function getNotifyOnUnsubscribe(): string
    {
        return $this->notifyOnUnsubscribe;
    }

    /**
     * @param string $notifyOnUnsubscribe
     *
     * @return AudienceList
     */
    public function setNotifyOnUnsubscribe(string $notifyOnUnsubscribe): AudienceList
    {
        if (!$this->emailValidator->isValid($notifyOnUnsubscribe, new RFCValidation())) {
            throw new \InvalidArgumentException("$notifyOnUnsubscribe is not a valid email");
        }

        $this->notifyOnUnsubscribe = $notifyOnUnsubscribe;
        return $this;
    }

    /**
     * Whether the list supports multiple formats for emails. When set to true,
     * subscribers can choose whether they want to receive HTML or plain-text emails.
     * When set to false, subscribers will receive HTML emails, with a plain-text alternative backup.
     *
     * @return bool
     */
    public function isEmailTypeOption(): bool
    {
        return $this->emailTypeOption;
    }

    /**
     * @param bool $emailTypeOption
     *
     * @return AudienceList
     */
    public function setEmailTypeOption(bool $emailTypeOption): AudienceList
    {
        $this->emailTypeOption = $emailTypeOption;
        return $this;
    }

    /**
     * Whether this list is public or private.
     * Possible Values:
     * - pub
     * - prv
     *
     * @return string
     */
    public function getVisibility(): string
    {
        return $this->visibility;
    }

    /**
     * @param string $visibility
     *
     * @return AudienceList
     * @throws \InvalidArgumentException
     */
    public function setVisibility(string $visibility): AudienceList
    {
        if (!in_array($visibility, [self::VISIBILITY_PRIVATE, self::VISIBILITY_PUBLIC])) {
            throw new \InvalidArgumentException("$visibility is not a valid visibility value");
        }

        $this->visibility = $visibility;
        return $this;
    }

    /**
     * Whether or not to require the subscriber to confirm subscription via email.
     *
     * @return bool
     */
    public function isDoubleOptin(): bool
    {
        return $this->doubleOptin;
    }

    /**
     * @param bool $doubleOptin
     *
     * @return AudienceList
     */
    public function setDoubleOptin(bool $doubleOptin): AudienceList
    {
        $this->doubleOptin = $doubleOptin;
        return $this;
    }

    /**
     * Whether or not the list has marketing permissions (eg. GDPR) enabled.
     *
     * @return bool
     */
    public function isMarketingPermission(): bool
    {
        return $this->marketingPermission;
    }

    /**
     * @param bool $marketingPermission
     *
     * @return AudienceList
     */
    public function setMarketingPermission(bool $marketingPermission): AudienceList
    {
        $this->marketingPermission = $marketingPermission;
        return $this;
    }

    /**
     * Whether or not this list has a welcome automation connected.
     * Welcome Automations: welcomeSeries, singleWelcome, emailFollowup.
     *
     * @return bool
     */
    public function isHasWelcome(): bool
    {
        return $this->hasWelcome;
    }

    /**
     * @param bool $hasWelcome
     *
     * @return AudienceList
     */
    public function setHasWelcome(bool $hasWelcome): AudienceList
    {
        $this->hasWelcome = $hasWelcome;
        return $this;
    }

    /**
     * A string that uniquely identifies this list.
     *
     * @return null|string
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * The ID used in the Mailchimp web application.
     * View this list in your Mailchimp account at https://{dc}.admin.mailchimp.com/lists/members/?id={web_id}.
     *
     * @return null|int
     */
    public function getWebId(): ?int
    {
        return $this->webId;
    }

    /**
     * The date and time that this list was created.
     *
     * @return \DateTime
     */
    public function getDateCreated(): \DateTime
    {
        return $this->dateCreated;
    }

    /**
     * An auto-generated activity score for the list (0-5).
     *
     * @return int
     */
    public function getListRating(): int
    {
        return $this->listRating;
    }

    /**
     * Our EepURL shortened version of this list's subscribe form.
     *
     * @return string
     */
    public function getSubscribeUrlShort(): string
    {
        return $this->subscribeUrlShort;
    }

    /**
     * The full version of this list's subscribe form (host will vary).
     *
     * @return string
     */
    public function getSubscribeUrlLong(): string
    {
        return $this->subscribeUrlLong;
    }

    /**
     * The list's Email Beamer address.
     *
     * @return string
     */
    public function getBeamerAddress(): string
    {
        return $this->beamerAddress;
    }

    /**
     * Any list-specific modules installed for this list.
     *
     * @return array
     */
    public function getModules(): array
    {
        return $this->modules;
    }

    /**
     * Stats for the list. Many of these are cached for at least five minutes.
     *
     * @return Stats
     */
    public function getStats(): Stats
    {
        return $this->stats;
    }

    /**
     * A list of link types and descriptions for the API schema documents.
     *
     * @return Link[]
     */
    public function getLinks(): array
    {
        return $this->links;
    }
}