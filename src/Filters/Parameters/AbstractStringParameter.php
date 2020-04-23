<?php
/**
 * Project: mailchimp
 * User: Leandro Luccerini <leandro.luccerini@gmail.com>
 * Date: 22/04/20
 * Time: 09:54
 */

namespace Szopen\Mailchimp\Filters\Parameters;

/**
 * Class AbstractStringParameter
 *
 * Makes mandatory to add a String value
 *
 * @author Leandro Luccerini <leandro.luccerini@gmail.com>
 * @package Szopen\Mailchimp\Filters\Parameters
 */
abstract class AbstractStringParameter implements ParameterInterface
{

    /**
     * @var string
     */
    private $value;

    /**
     * AbstractIntParameter constructor.
     *
     * @param string $value
     */
    public function __construct(string $value)
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
        return $this->value;
    }
}