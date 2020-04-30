<?php
/**
 * Project: mailchimp
 * User: Leandro Luccerini <leandro.luccerini@gmail.com>
 * Date: 30/04/20
 * Time: 10:59
 */

namespace Szopen\Mailchimp\Filters\Parameters\Member;

use Szopen\Mailchimp\Filters\Parameters\AbstractStringParameter;

/**
 * Class StatusUnsubscribedParameter
 * The subscriber's status.
 *
 * @author Leandro Luccerini <leandro.luccerini@gmail.com>
 * @package Szopen\Mailchimp\Filters\Parameters\Member
 */
class StatusUnsubscribedParameter extends AbstractStringParameter
{

    /**
     * StatusUnsubscribedParameter constructor.
     */
    public function __construct()
    {
        parent::__construct('unsubscribed');
    }

    /**
     * @inheritDoc
     */
    public function getKey(): string
    {
        return 'status';
    }
}