<?php
/**
 * Project: mailchimp
 * User: Leandro Luccerini <leandro.luccerini@gmail.com>
 * Date: 22/04/20
 * Time: 10:16
 */

namespace Szopen\Mailchimp\Filters\Parameters\Audience;

use \InvalidArgumentException;
use Szopen\Mailchimp\Filters\Parameters\AbstractIntParameter;

/**
 * Class CountParameter
 * The number of records to return. Default value is 10. Maximum value is 1000
 *
 * @author Leandro Luccerini <leandro.luccerini@gmail.com>
 * @package Szopen\Mailchimp\Filters\Parameters\Audience
 */
class CountParameter extends AbstractIntParameter
{

    /**
     * CountParameter constructor.
     *
     * @param int $value
     *
     * @throws InvalidArgumentException
     */
    public function __construct(int $value = 10)
    {
        if($value <= 0 || $value > 1000){
            throw new InvalidArgumentException("Value must be between 1 and 1000");
        }

        parent::__construct($value);
    }

    /**
     * @inheritDoc
     */
    public function getKey(): string
    {
        return 'count';
    }
}