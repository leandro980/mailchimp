<?php
/**
 * Project: mailchimp
 * User: Leandro Luccerini <leandro.luccerini@gmail.com>
 * Date: 22/04/20
 * Time: 09:36
 */

namespace Szopen\Mailchimp\Filters\Parameters;

/**
 * Interface ParameterInterface
 *
 * @author Leandro Luccerini <leandro.luccerini@gmail.com>
 * @package Szopen\Mailchimp\Filters\Parameters
 */
interface ParameterInterface
{
    /**
     * Get the name of the key of the parameter for the filter
     *
     * @return string
     */
    public function getKey(): string;

    /**
     * Get the value of the parameter
     *
     * @return mixed
     */
    public function getValue(): string;
}