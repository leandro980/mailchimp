<?php
/**
 * Project: mailchimp
 * User: Leandro Luccerini <leandro.luccerini@gmail.com>
 * Date: 30/04/20
 * Time: 10:56
 */

namespace Szopen\Mailchimp\Filters\Parameters\Member;

use Szopen\Mailchimp\Filters\Parameters\AbstractStringParameter;

/**
 * Class EmailTypeTextParameter
 * The email type.
 *
 * @author Leandro Luccerini <leandro.luccerini@gmail.com>
 * @package Szopen\Mailchimp\Filters\Parameters\Member
 */
class EmailTypeTextParameter extends AbstractStringParameter
{

    /**
     * EmailTypeTextParameter constructor.
     */
    public function __construct()
    {
        parent::__construct('text');
    }

    /**
     * @inheritDoc
     */
    public function getKey(): string
    {
        return 'email_type';
    }
}