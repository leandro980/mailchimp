<?php
/**
 * Project: mailchimp
 * User: Leandro Luccerini <leandro.luccerini@gmail.com>
 * Date: 22/04/20
 * Time: 10:59
 */

namespace Szopen\Mailchimp\Filters\Parameters\Audience;

use Szopen\Mailchimp\Filters\Parameters\AbstractStringParameter;

/**
 * Class EmailParameter
 * Restrict results to lists that include a specific subscriber's email address.
 *
 * @author Leandro Luccerini <leandro.luccerini@gmail.com>
 * @package Szopen\Mailchimp\Filters\Parameters\Audience
 */
class EmailParameter extends AbstractStringParameter
{

    /**
     * @inheritDoc
     */
    public function getKey(): string
    {
        return 'email';
    }
}