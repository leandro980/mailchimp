<?php
/**
 * Project: mailchimp
 * User: Leandro Luccerini <leandro.luccerini@gmail.com>
 * Date: 30/04/20
 * Time: 11:36
 */

namespace Szopen\Mailchimp\Filters\Parameters\Member;

use Szopen\Mailchimp\Filters\Parameters\AbstractStringParameter;

/**
 * Class SortByLastChangedParameter
 * Returns files sorted by the specified field.
 *
 * @author Leandro Luccerini <leandro.luccerini@gmail.com>
 * @package Szopen\Mailchimp\Filters\Parameters\Member
 */
class SortByLastChangedParameter extends AbstractStringParameter
{

    /**
     * SortByLastChangedParameter constructor.
     */
    public function __construct()
    {
        parent::__construct('last_changed');
    }

    /**
     * @inheritDoc
     */
    public function getKey(): string
    {
        return 'sort_field';
    }
}