<?php
/**
 * Project: mailchimp
 * User: Leandro Luccerini <leandro.luccerini@gmail.com>
 * Date: 30/04/20
 * Time: 11:02
 */

namespace Szopen\Mailchimp\Filters\Parameters\Member;

use Szopen\Mailchimp\Filters\Parameters\AbstractStringParameter;

/**
 * Class StatusCleanedParameter
 * The subscriber's status.
 *
 * @author Leandro Luccerini <leandro.luccerini@gmail.com>
 * @package Szopen\Mailchimp\Filters\Parameters\Member
 */
class StatusCleanedParameter extends AbstractStringParameter
{

    /**
     * StatusCleanedParameter constructor.
     */
    public function __construct()
    {
        parent::__construct('cleaned');
    }

    /**
     * @inheritDoc
     */
    public function getKey(): string
    {
        return 'status';
    }
}