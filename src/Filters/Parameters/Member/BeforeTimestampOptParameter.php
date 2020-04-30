<?php
/**
 * Project: mailchimp
 * User: Leandro Luccerini <leandro.luccerini@gmail.com>
 * Date: 30/04/20
 * Time: 11:19
 */

namespace Szopen\Mailchimp\Filters\Parameters\Member;

use Szopen\Mailchimp\Filters\Parameters\AbstractDateTimeParameter;

/**
 * Class BeforeTimestampOptParameter
 * Restrict results to subscribers who opted-in before the set timeframe.
 * We recommend ISO 8601 time format: 2015-10-21T15:41:36+00:00.
 *
 * @author Leandro Luccerini <leandro.luccerini@gmail.com>
 * @package Szopen\Mailchimp\Filters\Parameters\Member
 */
class BeforeTimestampOptParameter extends AbstractDateTimeParameter
{

    /**
     * @inheritDoc
     */
    public function getKey(): string
    {
        return 'before_timestamp_opt';
    }
}