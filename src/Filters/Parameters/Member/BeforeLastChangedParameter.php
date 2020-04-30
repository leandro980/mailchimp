<?php
/**
 * Project: mailchimp
 * User: Leandro Luccerini <leandro.luccerini@gmail.com>
 * Date: 30/04/20
 * Time: 11:21
 */

namespace Szopen\Mailchimp\Filters\Parameters\Member;

use Szopen\Mailchimp\Filters\Parameters\AbstractDateTimeParameter;

/**
 * Class BeforeLastChangedParameter
 * Restrict results to subscribers whose information changed before the set timeframe.
 * We recommend ISO 8601 time format: 2015-10-21T15:41:36+00:00.
 *
 * @author Leandro Luccerini <leandro.luccerini@gmail.com>
 * @package Szopen\Mailchimp\Filters\Parameters\Member
 */
class BeforeLastChangedParameter extends AbstractDateTimeParameter
{

    /**
     * @inheritDoc
     */
    public function getKey(): string
    {
        return 'before_last_changed';
    }
}