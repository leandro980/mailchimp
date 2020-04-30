<?php
/**
 * Project: mailchimp
 * User: Leandro Luccerini <leandro.luccerini@gmail.com>
 * Date: 30/04/20
 * Time: 11:28
 */

namespace Szopen\Mailchimp\Filters\Parameters\Member;

use Szopen\Mailchimp\Filters\Parameters\AbstractStringParameter;

/**
 * Class InterestCategoryIdParameter
 * The unique id for the interest category.
 *
 * @author Leandro Luccerini <leandro.luccerini@gmail.com>
 * @package Szopen\Mailchimp\Filters\Parameters\Member
 */
class InterestCategoryIdParameter extends AbstractStringParameter
{

    /**
     * @inheritDoc
     */
    public function getKey(): string
    {
        return 'interest_category_id';
    }
}