<?php
/**
 * Project: mailchimp
 * User: Leandro Luccerini <leandro.luccerini@gmail.com>
 * Date: 22/04/20
 * Time: 11:06
 */

namespace Szopen\Mailchimp\Filters;


use InvalidArgumentException;
use Szopen\Mailchimp\Filters\Parameters\ParameterInterface;

class Filter
{

    /**
     * @var array
     */
    private $parameters = [];

    /**
     * Filter constructor.
     *
     * @param array ParameterInterface[] $parameters
     */
    public function __construct(array $parameters = [])
    {
        foreach ($parameters as $p){
            $this->addParameter($p);
        }
    }

    /**
     * Adds a ParameterInterface to be used as filter
     *
     * @param ParameterInterface $parameter
     *
     * @return Filter
     */
    public function addParameter(ParameterInterface $parameter): self
    {
        if (!$parameter instanceof ParameterInterface){
            throw new InvalidArgumentException("Value is not a valid ParameterInterface");
        }

        foreach ($this->parameters as $p){
            if($p->getKey() == $parameter->getKey()){
                return $this;
            }
        }

        $this->parameters[] = $parameter;

        return $this;
    }

    /**
     * Returns all the registered Parameters
     *
     * @return array
     */
    public function getParameters(): array
    {
        return $this->parameters;
    }

    /**
     * Gets the array used to filter the mailchimp results
     *
     * @return array
     */
    public function getParametersArray(): array
    {
        $parameters = [];

        foreach ($this->parameters as $parameter){
            $parameters[$parameter->getKey()] = $parameter->getValue();
        }

        return $parameters;
    }
}