<?php
/**
 * Project: mailchimp
 * User: Leandro Luccerini <leandro.luccerini@gmail.com>
 * Date: 30/04/20
 * Time: 11:03
 */

namespace Szopen\Mailchimp\Filters\Parameters\Member;

use Szopen\Mailchimp\Filters\Parameters\AbstractStringParameter;

/**
 * Class StatusPendingParameter
 * The subscriber's status.
 *
 * @author Leandro Luccerini <leandro.luccerini@gmail.com>
 * @package Szopen\Mailchimp\Filters\Parameters\Member
 */
class StatusPendingParameter extends AbstractStringParameter
{

    /**
     * StatusPendingParameter constructor.
     */
    public function __construct()
    {
        parent::__construct('pending');
    }

    /**
     * @inheritDoc
     */
    public function getKey(): string
    {
        return 'status';
    }
}