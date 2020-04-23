<?php
/**
 * Project: mailchimp
 * User: Leandro Luccerini <leandro.luccerini@gmail.com>
 * Date: 22/04/20
 * Time: 10:59
 */

namespace Szopen\Mailchimp\Filters\Parameters;

/**
 * Class EmailParameter
 * Restrict results to lists that include a specific subscriber's email address.
 *
 * @author Leandro Luccerini <leandro.luccerini@gmail.com>
 * @package Szopen\Mailchimp\Filters\Parameters
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