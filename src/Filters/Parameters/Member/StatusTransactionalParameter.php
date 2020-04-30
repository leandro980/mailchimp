<?php
/**
 * Project: mailchimp
 * User: Leandro Luccerini <leandro.luccerini@gmail.com>
 * Date: 30/04/20
 * Time: 11:04
 */

namespace Szopen\Mailchimp\Filters\Parameters\Member;

use Szopen\Mailchimp\Filters\Parameters\AbstractStringParameter;

/**
 * Class StatusTransactionalParameter
 * The subscriber's status.
 *
 * @author Leandro Luccerini <leandro.luccerini@gmail.com>
 * @package Szopen\Mailchimp\Filters\Parameters\Member
 */
class StatusTransactionalParameter extends AbstractStringParameter
{

    /**
     * StatusTransactionalParameter constructor.
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