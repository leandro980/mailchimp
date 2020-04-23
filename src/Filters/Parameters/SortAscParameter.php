<?php
/**
 * Project: mailchimp
 * User: Leandro Luccerini <leandro.luccerini@gmail.com>
 * Date: 22/04/20
 * Time: 11:02
 */

namespace Szopen\Mailchimp\Filters\Parameters;

/**
 * Class SortAscParameter
 * Determines the order direction for sorted results.
 *
 * @author Leandro Luccerini <leandro.luccerini@gmail.com>
 * @package Szopen\Mailchimp\Filters\Parameters
 */
class SortAscParameter extends AbstractStringParameter
{

    /**
     * DateCreatedSortField constructor.
     */
    public function __construct()
    {
        parent::__construct('ASC');
    }

    /**
     * @inheritDoc
     */
    public function getKey(): string
    {
        return 'sort_dir';
    }
}