<?php
/**
 * Project: mailchimp
 * User: Leandro Luccerini <leandro.luccerini@gmail.com>
 * Date: 22/04/20
 * Time: 11:04
 */

namespace Szopen\Mailchimp\Filters\Parameters;


class SortDescParameter extends AbstractStringParameter
{

    /**
     * DateCreatedSortField constructor.
     */
    public function __construct()
    {
        parent::__construct('DESC');
    }

    /**
     * @inheritDoc
     */
    public function getKey(): string
    {
        return 'sort_dir';
    }
}