<?php
/**
 * Project: mailchimp
 * User: Leandro Luccerini <leandro.luccerini@gmail.com>
 * Date: 30/04/20
 * Time: 11:32
 */

namespace Szopen\Mailchimp\Filters\Parameters\Member;

use Szopen\Mailchimp\Filters\Parameters\AbstractStringParameter;

/**
 * Class InterestMatchAnyParameter
 * Used to filter list members by interests.
 * Must be accompanied by interest_category_id and interest_ids.
 * "any" will match a member with any of the interest supplied,
 * "all" will only match members with every interest supplied,
 * and "none" will match members without any of the interest supplied.
 *
 * @author Leandro Luccerini <leandro.luccerini@gmail.com>
 * @package Szopen\Mailchimp\Filters\Parameters\Member
 */
class InterestMatchAnyParameter extends AbstractStringParameter
{

    /**
     * InterestMatchAnyParameter constructor.
     */
    public function __construct()
    {
        parent::__construct('any');
    }

    /**
     * @inheritDoc
     */
    public function getKey(): string
    {
        return 'interest_match';
    }
}