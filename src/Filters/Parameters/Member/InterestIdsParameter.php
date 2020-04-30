<?php
/**
 * Project: mailchimp
 * User: Leandro Luccerini <leandro.luccerini@gmail.com>
 * Date: 30/04/20
 * Time: 11:28
 */

namespace Szopen\Mailchimp\Filters\Parameters\Member;

use Szopen\Mailchimp\Filters\Parameters\AbstractArrayParameter;

/**
 * Class InterestIdsParameter
 * Used to filter list members by interests.
 * Must be accompanied by interest_category_id and interest_match.
 * The value must be a comma separated list of interest ids present for any supplied interest categories.
 *
 * @author Leandro Luccerini <leandro.luccerini@gmail.com>
 * @package Szopen\Mailchimp\Filters\Parameters\Member
 */
class InterestIdsParameter extends AbstractArrayParameter
{

    /**
     * @inheritDoc
     */
    public function getKey(): string
    {
        return 'interest_ids';
    }
}