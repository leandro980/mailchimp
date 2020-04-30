<?php
/**
 * Project: mailchimp
 * User: Leandro Luccerini <leandro.luccerini@gmail.com>
 * Date: 30/04/20
 * Time: 11:27
 */

namespace Szopen\Mailchimp\Filters\Parameters\Member;

use Szopen\Mailchimp\Filters\Parameters\AbstractBooleanParameter;

/**
 * Class VipOnlyParameter
 * A filter to return only the list's VIP members.
 * Passing true will restrict results to VIP list members, passing false will return all list members.
 *
 * @author Leandro Luccerini <leandro.luccerini@gmail.com>
 * @package Szopen\Mailchimp\Filters\Parameters\Member
 */
class VipOnlyParameter extends AbstractBooleanParameter
{

    /**
     * @inheritDoc
     */
    public function getKey(): string
    {
        return 'vip_only';
    }
}