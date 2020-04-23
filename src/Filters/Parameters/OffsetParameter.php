<?php
/**
 * Project: mailchimp
 * User: Leandro Luccerini <leandro.luccerini@gmail.com>
 * Date: 22/04/20
 * Time: 10:20
 */

namespace Szopen\Mailchimp\Filters\Parameters;

use \InvalidArgumentException;

/**
 * Class OffsetParameter
 * The number of records from a collection to skip.
 * Iterating over large collections with this parameter can be slow.
 * Default value is 0.
 *
 * @author Leandro Luccerini <leandro.luccerini@gmail.com>
 * @package Szopen\Mailchimp\Filters\Parameters
 */
class OffsetParameter extends AbstractIntParameter
{

    /**
     * OffsetParameter constructor.
     *
     * @param int $value
     *
     * @throws InvalidArgumentException
     */
    public function __construct(int $value = 0)
    {
        if($value < 0){
            throw new InvalidArgumentException("Value must be greater than or equal to 0");
        }

        parent::__construct($value);
    }

    /**
     * @inheritDoc
     */
    public function getKey(): string
    {
        return 'offset';
    }
}