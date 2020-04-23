<?php
/**
 * Project: mailchimp
 * User: Leandro Luccerini <leandro.luccerini@gmail.com>
 * Date: 22/04/20
 * Time: 10:06
 */

namespace Szopen\Mailchimp\Filters\Parameters;


abstract class AbstractArrayParameter implements ParameterInterface
{

    /**
     * @var array
     */
    private $value;

    /**
     * AbstractIntParameter constructor.
     *
     * @param array $value
     */
    public function __construct(array $value)
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
        return implode(",", $this->value);
    }
}