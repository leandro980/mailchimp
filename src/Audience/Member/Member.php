<?php
/**
 * Project: mailchimp
 * User: Leandro Luccerini <leandro.luccerini@gmail.com>
 * Date: 24/04/20
 * Time: 10:32
 */

namespace Szopen\Mailchimp\Audience\Member;


use DateTime;
use JsonSerializable;
use Szopen\Mailchimp\Audience\Link;
use Szopen\Mailchimp\Helper\JsonSerialiazerTrait;

/**
 * Class Member
 *
 * @author Leandro Luccerini <leandro.luccerini@gmail.com>
 * @package Szopen\Mailchimp\Audience\Member
 */
class Member implements JsonSerializable
{
    use JsonSerialiazerTrait;

    const EMAIL_TEXT = 'text';
    const EMAIL_HTML = 'html';

    const STATUS_SUBSCRIBED = 'subscribed';
    const STATUS_UNSUBSCRIBED = 'unsubscribed';
    const STATUS_CLEANED = 'cleaned';
    const STATUS_PENDING = 'pending';
    const STATUS_TRANSACTIONAL = 'transactional';
    const STATUS_ARCHIVED = 'archived';

    /**
     * The MD5 hash of the lowercase version of the list member's email address.
     *
     * @var string
     */
    private $id;

    /**
     * Email address for a subscriber.
     *
     * @var string
     */
    private $emailAddress;

    /**
     * An identifier for the address across all of Mailchimp.
     *
     * @var string
     */
    private $uniqueEmailId;

    /**
     * The ID used in the Mailchimp web application.
     * View this member in your Mailchimp account at https://{dc}.admin.mailchimp.com/lists/members/view?id={web_id}.
     *
     * @var string
     */
    private $webId;

    /**
     * Type of email this member asked to get ('html' or 'text').
     *
     * @var string
     */
    private $emailType;

    /**
     * Subscriber's current status.
     *
     * @var string
     */
    private $status;

    /**
     * A subscriber's reason for unsubscribing.
     *
     * @var string
     */
    private $unsubscribeReason;

    /**
     * An individual merge var and value for a member.
     *
     * @var array
     */
    private $mergeFields;

    /**
     * The key of this object's properties is the ID of the interest in question.
     *
     * @var
     */
    private $interests;

    /**
     * Open and click rates for this subscriber.
     *
     * @var Stats
     */
    private $stats;

    /**
     * IP address the subscriber signed up from.
     *
     * @var string
     */
    private $ipSignup;

    /**
     * The date and time the subscriber signed up for the list in ISO 8601 format.
     *
     * @var DateTime
     */
    private $timpestampSignup;

    /**
     * The IP address the subscriber used to confirm their opt-in status.
     *
     * @var string
     */
    private $ipOpt;

    /**
     * The date and time the subscribe confirmed their opt-in status in ISO 8601 format.
     *
     * @var DateTime
     */
    private $timestampOpt;

    /**
     * Star rating for this member, between 1 and 5.
     *
     * @var int
     */
    private $memberRating;

    /**
     * The date and time the member's info was last changed in ISO 8601 format.
     *
     * @var DateTime
     */
    private $lastChanged;

    /**
     * If set/detected, the subscriber's language.
     *
     * @var string
     */
    private $language;

    /**
     * VIP status for subscriber.
     *
     * @var bool
     */
    private $vip;

    /**
     * The list member's email client.
     *
     * @var string
     */
    private $emailClient;

    /**
     * Subscriber location information.
     *
     * @var Location
     */
    private $location;

    /**
     * The marketing permissions for the subscriber.
     *
     * @var MarketingPermission
     */
    private $marketingPermissions;

    /**
     * The most recent Note added about this member.
     *
     * @var Note
     */
    private $lastNote;

    /**
     * The source from which the subscriber was added to this list.
     *
     * @var string
     */
    private $source;

    /**
     * The number of tags applied to this member.
     *
     * @var int
     */
    private $tagsCount;

    /**
     * Returns up to 50 tags applied to this member. To retrieve all tags see Member Tags.
     *
     * @var Tag[]
     */
    private $tags;

    /**
     * The list id.
     *
     * @var string
     */
    private $listId;

    /**
     * A list of link types and descriptions for the API schema documents.
     *
     * @var Link[]
     */
    private $links;

    /**
     * Member constructor.
     */
    public function __construct()
    {
        $this->allowedVarsToSerialization = ['emailAddress', 'emailType', 'status', 'mergeFields', 'interests',
            'language', 'vip', 'location', 'marketingPersmissions', 'tags', ];
    }

    /**
     * @return string
     */
    public function getEmailType(): string
    {
        return $this->emailType;
    }

    /**
     * @param string $emailType
     *
     * @return Member
     */
    public function setEmailType(string $emailType): Member
    {
        $this->emailType = $emailType;
        return $this;
    }

    /**
     * @return string
     */
    public function getStatus(): string
    {
        return $this->status;
    }

    /**
     * @param string $status
     *
     * @return Member
     */
    public function setStatus(string $status): Member
    {
        $this->status = $status;
        return $this;
    }

    /**
     * @return string
     */
    public function getUnsubscribeReason(): string
    {
        return $this->unsubscribeReason;
    }

    /**
     * @param string $unsubscribeReason
     *
     * @return Member
     */
    public function setUnsubscribeReason(string $unsubscribeReason): Member
    {
        $this->unsubscribeReason = $unsubscribeReason;
        return $this;
    }

    /**
     * @return array
     */
    public function getMergeFields(): array
    {
        return $this->mergeFields;
    }

    /**
     * @param array $mergeFields
     *
     * @return Member
     */
    public function setMergeFields(array $mergeFields): Member
    {
        $this->mergeFields = $mergeFields;
        return $this;
    }

    /**
     * @return Location
     */
    public function getLocation(): Location
    {
        return $this->location;
    }

    /**
     * @param Location $location
     *
     * @return Member
     */
    public function setLocation(Location $location): Member
    {
        $this->location = $location;
        return $this;
    }

    /**
     * @return Tag[]
     */
    public function getTags(): array
    {
        return $this->tags;
    }

    /**
     * @param Tag[] $tags
     *
     * @return Member
     */
    public function setTags(array $tags): Member
    {
        $this->tags = $tags;
        return $this;
    }

    /**
     * @return string
     */
    public function getListId(): string
    {
        return $this->listId;
    }

    /**
     * @param string $listId
     *
     * @return Member
     */
    public function setListId(string $listId): Member
    {
        $this->listId = $listId;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getInterests()
    {
        return $this->interests;
    }

    /**
     * @param mixed $interests
     *
     * @return Member
     */
    public function setInterests($interests)
    {
        $this->interests = $interests;
        return $this;
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getEmailAddress(): string
    {
        return $this->emailAddress;
    }

    /**
     * @return string
     */
    public function getUniqueEmailId(): string
    {
        return $this->uniqueEmailId;
    }

    /**
     * @return string
     */
    public function getWebId(): string
    {
        return $this->webId;
    }

    /**
     * @return Stats
     */
    public function getStats(): Stats
    {
        return $this->stats;
    }

    /**
     * @return string
     */
    public function getIpSignup(): string
    {
        return $this->ipSignup;
    }

    /**
     * @return DateTime
     */
    public function getTimpestampSignup(): DateTime
    {
        return $this->timpestampSignup;
    }

    /**
     * @return string
     */
    public function getIpOpt(): string
    {
        return $this->ipOpt;
    }

    /**
     * @return DateTime
     */
    public function getTimestampOpt(): DateTime
    {
        return $this->timestampOpt;
    }

    /**
     * @return int
     */
    public function getMemberRating(): int
    {
        return $this->memberRating;
    }

    /**
     * @return DateTime
     */
    public function getLastChanged(): DateTime
    {
        return $this->lastChanged;
    }

    /**
     * @return string
     */
    public function getLanguage(): string
    {
        return $this->language;
    }

    /**
     * @return bool
     */
    public function isVip(): bool
    {
        return $this->vip;
    }

    /**
     * @return string
     */
    public function getEmailClient(): string
    {
        return $this->emailClient;
    }

    /**
     * @return MarketingPermission
     */
    public function getMarketingPermissions(): MarketingPermission
    {
        return $this->marketingPermissions;
    }

    /**
     * @return Note
     */
    public function getLastNote(): Note
    {
        return $this->lastNote;
    }

    /**
     * @return string
     */
    public function getSource(): string
    {
        return $this->source;
    }

    /**
     * @return int
     */
    public function getTagsCount(): int
    {
        return $this->tagsCount;
    }

    /**
     * @return Link[]
     */
    public function getLinks(): array
    {
        return $this->links;
    }

}