<?php
/**
 * Project: mailchimp
 * User: Leandro Luccerini <leandro.luccerini@gmail.com>
 * Date: 30/04/20
 * Time: 11:35
 */

namespace Szopen\Mailchimp\Filters\Parameters\Member;

use Szopen\Mailchimp\Filters\Parameters\AbstractStringParameter;

/**
 * Class SortByTimestampSignupParameter
 * Returns files sorted by the specified field.
 *
 * @author Leandro Luccerini <leandro.luccerini@gmail.com>
 * @package Szopen\Mailchimp\Filters\Parameters\Member
 */
class SortByTimestampSignupParameter extends AbstractStringParameter
{
    /**
     * SortByTimestampSignupParameter constructor.
     */
    public function __construct()
    {
        parent::__construct('timestamp_signup');
    }

    /**
     * @inheritDoc
     */
    public function getKey(): string
    {
        return 'sort_field';
    }
}