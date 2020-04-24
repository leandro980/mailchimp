<?php
/**
 * Project: mailchimp
 * User: Leandro Luccerini <leandro.luccerini@gmail.com>
 * Date: 23/04/20
 * Time: 15:55
 */

namespace Szopen\Mailchimp\Audience\Member;


use JsonSerializable;
use Szopen\Mailchimp\Helper\JsonSerialiazerTrait;

/**
 * Class MarketingPermission
 * The marketing permissions for the subscriber.
 *
 * @author Leandro Luccerini <leandro.luccerini@gmail.com>
 * @package Szopen\Mailchimp\Audience\Member
 */
class MarketingPermission implements JsonSerializable
{
    use JsonSerialiazerTrait;

    /**
     * @var string
     */
    private $marketingPermissionId;

    /**
     * @var bool
     */
    private $enabled;

    /**
     * @var string
     */
    private $text;

    /**
     * MarketingPermission constructor.
     */
    public function __construct()
    {
        $this->allowedVarsToSerialization  = ["marketingPermissionId", "enabled"];
    }

    /**
     * The id for the marketing permission on the list
     *
     * @return string
     */
    public function getMarketingPermissionId(): string
    {
        return $this->marketingPermissionId;
    }

    /**
     * The id for the marketing permission on the list
     *
     * @param string $marketingPermissionId
     *
     * @return MarketingPermission
     */
    public function setMarketingPermissionId(string $marketingPermissionId): MarketingPermission
    {
        $this->marketingPermissionId = $marketingPermissionId;
        return $this;
    }

    /**
     * If the subscriber has opted-in to the marketing permission.
     *
     * @return bool
     */
    public function isEnabled(): bool
    {
        return $this->enabled;
    }

    /**
     * If the subscriber has opted-in to the marketing permission.
     *
     * @param bool $enabled
     *
     * @return MarketingPermission
     */
    public function setEnabled(bool $enabled): MarketingPermission
    {
        $this->enabled = $enabled;
        return $this;
    }

    /**
     * The text of the marketing permission.
     *
     * @return string
     */
    public function getText(): string
    {
        return $this->text;
    }

    /**
     * @param string $text
     *
     * @return MarketingPermission
     */
    public function setText(string $text): MarketingPermission
    {
        $this->text = $text;
        return $this;
    }

}