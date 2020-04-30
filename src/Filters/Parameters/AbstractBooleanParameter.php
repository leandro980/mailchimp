<?php
/**
 * Project: mailchimp
 * User: Leandro Luccerini <leandro.luccerini@gmail.com>
 * Date: 30/04/20
 * Time: 11:24
 */

namespace Szopen\Mailchimp\Filters\Parameters;


abstract class AbstractBooleanParameter implements ParameterInterface
{
    /**
     * @var bool
     */
    private $value;

    /**
     * AbstractIntParameter constructor.
     *
     * @param bool $value
     */
    public function __construct(bool $value)
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
        return $this->value ? 'true' : 'false';
    }
}