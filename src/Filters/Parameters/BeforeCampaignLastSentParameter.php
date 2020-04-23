<?php
/**
 * Project: mailchimp
 * User: Leandro Luccerini <leandro.luccerini@gmail.com>
 * Date: 22/04/20
 * Time: 10:56
 */

namespace Szopen\Mailchimp\Filters\Parameters;

/**
 * Class BeforeCampaignLastSentParameter
 * Restrict results to lists created before the last campaign send date.
 * We recommend ISO 8601 time format: 2015-10-21T15:41:36+00:00.
 *
 * @author Leandro Luccerini <leandro.luccerini@gmail.com>
 * @package Szopen\Mailchimp\Filters\Parameters
 */
class BeforeCampaignLastSentParameter extends AbstractDateTimeParameter
{

    /**
     * @inheritDoc
     */
    public function getKey(): string
    {
        return 'before_campaign_last_sent';
    }
}