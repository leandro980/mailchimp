<?php
/**
 * Project: mailchimp
 * User: Leandro Luccerini <leandro.luccerini@gmail.com>
 * Date: 22/04/20
 * Time: 10:13
 */

namespace Szopen\Mailchimp\Filters\Parameters;

/**
 * Class FieldsParameter
 * A comma-separated list of fields to return. Reference parameters of sub-objects with dot notation.
 *
 * @author Leandro Luccerini <leandro.luccerini@gmail.com>
 * @package Szopen\Mailchimp\Filters\Parameters
 */
class FieldsParameter extends AbstractArrayParameter
{

    /**
     * @inheritDoc
     */
    public function getKey(): string
    {
        return "fields";
    }
}