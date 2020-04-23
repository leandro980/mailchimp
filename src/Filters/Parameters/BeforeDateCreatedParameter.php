<?php
/**
 * Project: mailchimp
 * User: Leandro Luccerini <leandro.luccerini@gmail.com>
 * Date: 22/04/20
 * Time: 10:24
 */

namespace Szopen\Mailchimp\Filters\Parameters;

/**
 * Class BeforeDateCreated
 * Restrict response to lists created before the set date. We recommend ISO 8601 time format: 2015-10-21T15:41:36+00:00.
 *
 * @author Leandro Luccerini <leandro.luccerini@gmail.com>
 * @package Szopen\Mailchimp\Filters\Parameters
 */
class BeforeDateCreatedParameter extends AbstractDateTimeParameter
{

    /**
     * @inheritDoc
     */
    public function getKey(): string
    {
        return 'before_date_created';
    }
}