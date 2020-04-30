<?php
/**
 * Project: mailchimp
 * User: Leandro Luccerini <leandro.luccerini@gmail.com>
 * Date: 30/04/20
 * Time: 11:31
 */

namespace Szopen\Mailchimp\Filters\Parameters\Member;

use Szopen\Mailchimp\Filters\Parameters\AbstractStringParameter;

/**
 * Class InterestMatchNoneParameter
 * Used to filter list members by interests.
 * Must be accompanied by interest_category_id and interest_ids.
 * "any" will match a member with any of the interest supplied,
 * "all" will only match members with every interest supplied,
 * and "none" will match members without any of the interest supplied.
 *
 * @author Leandro Luccerini <leandro.luccerini@gmail.com>
 * @package Szopen\Mailchimp\Filters\Parameters\Member
 */
class InterestMatchNoneParameter extends AbstractStringParameter
{

    /**
     * InterestMatchNoneParameter constructor.
     */
    public function __construct()
    {
        parent::__construct('none');
    }

    /**
     * @inheritDoc
     */
    public function getKey(): string
    {
        return 'interest_match';
    }
}