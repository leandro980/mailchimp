<?php
/**
 * Project: mailchimp
 * User: Leandro Luccerini <leandro.luccerini@gmail.com>
 * Date: 30/04/20
 * Time: 10:57
 */

namespace Szopen\Mailchimp\Filters\Parameters\Member;

use Szopen\Mailchimp\Filters\Parameters\AbstractStringParameter;

/**
 * Class StatusSubscribedParameter
 * The subscriber's status.
 *
 *
 * @author Leandro Luccerini <leandro.luccerini@gmail.com>
 * @package Szopen\Mailchimp\Filters\Parameters\Member
 */
class StatusSubscribedParameter extends AbstractStringParameter
{

    /**
     * StatusSubscribedParameter constructor.
     */
    public function __construct()
    {
        parent::__construct('subscribed');
    }

    /**
     * @inheritDoc
     */
    public function getKey(): string
    {
        return 'status';
    }
}