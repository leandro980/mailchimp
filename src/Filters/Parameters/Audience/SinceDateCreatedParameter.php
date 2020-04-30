<?php
/**
 * Project: mailchimp
 * User: Leandro Luccerini <leandro.luccerini@gmail.com>
 * Date: 22/04/20
 * Time: 10:55
 */

namespace Szopen\Mailchimp\Filters\Parameters\Audience;

use Szopen\Mailchimp\Filters\Parameters\AbstractDateTimeParameter;

/**
 * Class SinceDateCreatedParameter
 * Restrict results to lists created after the set date.
 * We recommend ISO 8601 time format: 2015-10-21T15:41:36+00:00.
 *
 * @author Leandro Luccerini <leandro.luccerini@gmail.com>
 * @package Szopen\Mailchimp\Filters\Parameters\Audience
 */
class SinceDateCreatedParameter extends AbstractDateTimeParameter
{

    /**
     * @inheritDoc
     */
    public function getKey(): string
    {
        return 'since_date_created';
    }
}