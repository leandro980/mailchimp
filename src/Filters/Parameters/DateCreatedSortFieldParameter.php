<?php
/**
 * Project: mailchimp
 * User: Leandro Luccerini <leandro.luccerini@gmail.com>
 * Date: 22/04/20
 * Time: 11:01
 */

namespace Szopen\Mailchimp\Filters\Parameters;

/**
 * Class DateCreatedSortField
 * Returns files sorted by the specified field.
 *
 * @author Leandro Luccerini <leandro.luccerini@gmail.com>
 * @package Szopen\Mailchimp\Filters\Parameters
 */
class DateCreatedSortFieldParameter extends AbstractStringParameter
{

    /**
     * DateCreatedSortField constructor.
     */
    public function __construct()
    {
        parent::__construct('date_created');
    }

    /**
     * @inheritDoc
     */
    public function getKey(): string
    {
        return 'sort_field';
    }
}