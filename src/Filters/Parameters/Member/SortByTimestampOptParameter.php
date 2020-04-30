<?php
/**
 * Project: mailchimp
 * User: Leandro Luccerini <leandro.luccerini@gmail.com>
 * Date: 30/04/20
 * Time: 11:33
 */

namespace Szopen\Mailchimp\Filters\Parameters\Member;

use Szopen\Mailchimp\Filters\Parameters\AbstractStringParameter;

/**
 * Class SortByTimestampOptParameter
 * Returns files sorted by the specified field.
 *
 * @author Leandro Luccerini <leandro.luccerini@gmail.com>
 * @package Szopen\Mailchimp\Filters\Parameters\Member
 */
class SortByTimestampOptParameter extends AbstractStringParameter
{

    /**
     * SortByTimestampOptParameter constructor.
     */
    public function __construct()
    {
        parent::__construct('timestamp_opt');
    }

    /**
     * @inheritDoc
     */
    public function getKey(): string
    {
        return 'sort_field';
    }
}