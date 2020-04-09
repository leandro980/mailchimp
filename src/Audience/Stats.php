<?php
/**
 * Project: szopen\mailchimp
 *
 * Author: Leandro Luccerini <leandro.luccerini@gmail.com>
 * Created: 09/04/2020 12:04
 */

namespace Szopen\Mailchimp\Audience;

/**
 * Class Stats
 *
 * @package Szopen\Mailchimp\Audience
 */
class Stats
{
    /**
     * The number of active members in the list.
     *
     * @var int
     */
    private $memberCount;

    /**
     * The number of contacts in the list, including subscribed, unsubscribed, pending,
     * cleaned, deleted, transactional, and those that need to be reconfirmed.
     *
     * @var int
     */
    private $totalContacts;

    /**
     * The number of members who have unsubscribed from the list.
     *
     * @var int
     */
    private $unsubscribeCount;

    /**
     * The number of members cleaned from the list.
     *
     * @var int
     */
    private $cleanedCount;

    /**
     * The number of active members in the list since the last campaign was sent.
     *
     * @var int
     */
    private $memberCountSinceSend;

    /**
     * The number of members who have unsubscribed since the last campaign was sent.
     *
     * @var int
     */
    private $unsubscribeCountSinceSend;

    /**
     * The number of members cleaned from the list since the last campaign was sent.
     *
     * @var int
     */
    private $cleanedCountSinceSend;

    /**
     * The number of campaigns in any status that use this list.
     *
     * @var int
     */
    private $campaignCount;

    /**
     * The date and time the last campaign was sent to this list in ISO 8601 format.
     * This is updated when a campaign is sent to 10 or more recipients.
     *
     * @var \DateTime
     */
    private $campaignLastSent;

    /**
     * The number of merge vars for this list (not EMAIL, which is required).
     *
     * @var int
     */
    private $mergeFieldCount;

    /**
     * The average number of subscriptions per month for the list (not returned if we haven't calculated it yet).
     *
     * @var float
     */
    private $avgSubRate;

    /**
     * The average number of unsubscriptions per month for the list (not returned if we haven't calculated it yet).
     *
     * @var float
     */
    private $avgUnsubRate = null;

    /**
     * The target number of subscriptions per month for the list to keep it growing
     * (not returned if we haven't calculated it yet).
     *
     * @var float
     */
    private $targetSubRate = null;

    /**
     * The average open rate (a percentage represented as a number between 0 and 100) per campaign for the list
     * (not returned if we haven't calculated it yet).
     *
     * @var float
     */
    private $openRate = null;

    /**
     * The average click rate (a percentage represented as a number between 0 and 100) per campaign for the list
     * (not returned if we haven't calculated it yet).
     *
     * @var float
     */
    private $clickRate = null;

    /**
     * The date and time of the last time someone subscribed to this list in ISO 8601 format.
     *
     * @var \DateTime
     */
    private $lastSubDate;

    /**
     * The date and time of the last time someone unsubscribed from this list in ISO 8601 format.
     *
     * @var \DateTime
     */
    private $lastUnsubDate;

    /**
     * The number of active members in the list.
     *
     * @return int
     */
    public function getMemberCount(): int
    {
        return $this->memberCount;
    }

    /**
     * The number of contacts in the list, including subscribed, unsubscribed, pending,
     * cleaned, deleted, transactional, and those that need to be reconfirmed.
     *
     * @return int
     */
    public function getTotalContacts(): int
    {
        return $this->totalContacts;
    }

    /**
     * The number of members who have unsubscribed from the list.
     *
     * @return int
     */
    public function getUnsubscribeCount(): int
    {
        return $this->unsubscribeCount;
    }

    /**
     * The number of members cleaned from the list since the last campaign was sent.
     *
     * @return int
     */
    public function getCleanedCount(): int
    {
        return $this->cleanedCount;
    }

    /**
     * The number of active members in the list since the last campaign was sent.
     *
     * @return int
     */
    public function getMemberCountSinceSend(): int
    {
        return $this->memberCountSinceSend;
    }

    /**
     * The number of members who have unsubscribed since the last campaign was sent.
     *
     * @return int
     */
    public function getUnsubscribeCountSinceSend(): int
    {
        return $this->unsubscribeCountSinceSend;
    }

    /**
     * The number of members cleaned from the list since the last campaign was sent.
     *
     * @return int
     */
    public function getCleanedCountSinceSend(): int
    {
        return $this->cleanedCountSinceSend;
    }

    /**
     * The number of campaigns in any status that use this list.
     *
     * @return int
     */
    public function getCampaignCount(): int
    {
        return $this->campaignCount;
    }

    /**
     * The date and time the last campaign was sent to this list.
     * This is updated when a campaign is sent to 10 or more recipients.
     *
     * @return \DateTime
     */
    public function getCampaignLastSent(): \DateTime
    {
        return $this->campaignLastSent;
    }

    /**
     * The number of merge vars for this list (not EMAIL, which is required).
     *
     * @return int
     */
    public function getMergeFieldCount(): int
    {
        return $this->mergeFieldCount;
    }

    /**
     * The average number of subscriptions per month for the list
     * (NULL returned if we haven't calculated it yet).
     *
     * @return null|float
     */
    public function getAvgSubRate(): ?float
    {
        return $this->avgSubRate;
    }

    /**
     * The average number of unsubscriptions per month for the list
     * (NULL returned if we haven't calculated it yet).
     *
     * @return null|float
     */
    public function getAvgUnsubRate(): ?float
    {
        return $this->avgUnsubRate;
    }

    /**
     * The target number of subscriptions per month for the list to keep it growing
     * (NULL returned if we haven't calculated it yet).
     *
     * @return null|float
     */
    public function getTargetSubRate(): ?float
    {
        return $this->targetSubRate;
    }

    /**
     * The average open rate (a percentage represented as a number between 0 and 100) per campaign for the list
     * (NULL returned if we haven't calculated it yet).
     *
     * @return null|float
     */
    public function getOpenRate(): ?float
    {
        return $this->openRate;
    }

    /**
     * The average click rate (a percentage represented as a number between 0 and 100) per campaign for the list
     * (NULL returned if we haven't calculated it yet).
     *
     * @return null|float
     */
    public function getClickRate(): ?float
    {
        return $this->clickRate;
    }

    /**
     * The date and time of the last time someone subscribed to this list.
     *
     * @return \DateTime
     */
    public function getLastSubDate(): \DateTime
    {
        return $this->lastSubDate;
    }

    /**
     * The date and time of the last time someone unsubscribed from this list.
     *
     * @return \DateTime
     */
    public function getLastUnsubDate(): \DateTime
    {
        return $this->lastUnsubDate;
    }
}