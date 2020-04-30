<?php
/**
 * Project: mailchimp
 * User: Leandro Luccerini <leandro.luccerini@gmail.com>
 * Date: 30/04/20
 * Time: 11:38
 */

namespace Szopen\Mailchimp\Filters\Parameters\Member;

use Szopen\Mailchimp\Filters\Parameters\AbstractDateTimeParameter;

/**
 * Class UnsubscribedSinceParameter
 * Filter subscribers by those unsubscribed since a specific date.
 * Using any status other than unsubscribed with this filter will result in an error.
 *
 * @author Leandro Luccerini <leandro.luccerini@gmail.com>
 * @package Szopen\Mailchimp\Filters\Parameters\Member
 */
class UnsubscribedSinceParameter extends AbstractDateTimeParameter
{

    /**
     * @inheritDoc
     */
    public function getKey(): string
    {
        return 'unsubscribed_since';
    }
}