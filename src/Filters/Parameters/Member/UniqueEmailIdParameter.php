<?php
/**
 * Project: mailchimp
 * User: Leandro Luccerini <leandro.luccerini@gmail.com>
 * Date: 30/04/20
 * Time: 11:23
 */

namespace Szopen\Mailchimp\Filters\Parameters\Member;

use Szopen\Mailchimp\Filters\Parameters\AbstractStringParameter;

/**
 * Class UniqueEmailIdParameter
 * A unique identifier for the email address across all Mailchimp lists.
 * This parameter can be found in any links with Ecommerce Tracking enabled.
 *
 * @author Leandro Luccerini <leandro.luccerini@gmail.com>
 * @package Szopen\Mailchimp\Filters\Parameters\Member
 */
class UniqueEmailIdParameter extends AbstractStringParameter
{

    /**
     * @inheritDoc
     */
    public function getKey(): string
    {
        return 'unique_email_id';
    }
}