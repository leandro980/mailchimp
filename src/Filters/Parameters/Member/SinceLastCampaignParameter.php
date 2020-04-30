<?php
/**
 * Project: mailchimp
 * User: Leandro Luccerini <leandro.luccerini@gmail.com>
 * Date: 30/04/20
 * Time: 11:37
 */

namespace Szopen\Mailchimp\Filters\Parameters\Member;

use Szopen\Mailchimp\Filters\Parameters\AbstractBooleanParameter;

/**
 * Class SinceLastCampaignParameter
 *
 * Filter subscribers by those subscribed/unsubscribed/pending/cleaned since last email campaign send.
 * Member status is required to use this filter.
 *
 * @author Leandro Luccerini <leandro.luccerini@gmail.com>
 * @package Szopen\Mailchimp\Filters\Parameters\Member
 */
class SinceLastCampaignParameter extends AbstractBooleanParameter
{

    /**
     * @inheritDoc
     */
    public function getKey(): string
    {
        return 'since_last_campaign';
    }
}