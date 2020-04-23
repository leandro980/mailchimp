<?php
/**
 * Project: mailchimp
 * User: Leandro Luccerini <leandro.luccerini@gmail.com>
 * Date: 22/04/20
 * Time: 09:46
 */

namespace Szopen\Mailchimp\Filters\Parameters;

/**
 * Class AbstractIntParameter
 *
 * Makes mandatory to add an Int value
 *
 * @author Leandro Luccerini <leandro.luccerini@gmail.com>
 * @package Szopen\Mailchimp\Filters\Parameters
 */
abstract class AbstractIntParameter implements ParameterInterface
{

    /**
     * @var string
     */
    private $value;

    /**
     * AbstractIntParameter constructor.
     *
     * @param int $value
     */
    public function __construct(int $value)
    {
        $this->value = (string) $value;
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