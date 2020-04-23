<?php
/**
 * Project: mailchimp
 * User: Leandro Luccerini <leandro.luccerini@gmail.com>
 * Date: 22/04/20
 * Time: 10:15
 */

namespace Szopen\Mailchimp\Filters\Parameters;

/**
 * Class ExcludeFieldsParameter
 * A comma-separated list of fields to exclude. Reference parameters of sub-objects with dot notation.
 *
 * @author Leandro Luccerini <leandro.luccerini@gmail.com>
 * @package Szopen\Mailchimp\Filters\Parameters
 */
class ExcludeFieldsParameter extends AbstractArrayParameter
{

    /**
     * @inheritDoc
     */
    public function getKey(): string
    {
        return 'exclude_fields';
    }
}