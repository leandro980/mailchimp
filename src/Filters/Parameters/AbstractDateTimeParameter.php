<?php
/**
 * Project: mailchimp
 * User: Leandro Luccerini <leandro.luccerini@gmail.com>
 * Date: 22/04/20
 * Time: 09:56
 */

namespace Szopen\Mailchimp\Filters\Parameters;


use DateTime;

abstract class AbstractDateTimeParameter implements ParameterInterface
{

    /**
     * @var DateTime
     */
    private $value;

    /**
     * AbstractIntParameter constructor.
     *
     * @param DateTime $value
     */
    public function __construct(DateTime $value)
    {
        $this->value = $value;
    }

    /**
     * @inheritDoc
     */
    abstract public function getKey(): string;

    /**
     * @inheritDoc
     */
    public function getValue(): string
    {
        return $this->value->format('c');
    }
}