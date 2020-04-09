<?php
/**
 * Project: szopen\mailchimp
 *
 * Author: Leandro Luccerini <leandro.luccerini@gmail.com>
 * Created: 08/04/2020 12:45
 */

namespace Szopen\Mailchimp\Helper;

/**
 * Trait JsonSerialiazerTrait
 *
 * @package Szopen\Mailchimp\Helper
 */
trait JsonSerialiazerTrait
{

    protected $allowedVarsToSerialization = [];

    /**
     * @return array
     */
    public function jsonSerialize(): array
    {
        $vars = get_object_vars($this);

        $returnArray = [];

        foreach ($vars as $k => $v) {
            if (!empty($this->allowedVarsToSerialization)
                && !in_array($k, $this->allowedVarsToSerialization)) {
                continue;
            } else {
                $k = $this->fromCamelCaseToSnakeCase($k);
                $returnArray[$k] = $v;
            }
        }

        return $returnArray;
    }

    /**
     * Converts camel case to snake case (thisIsAString -> this_is_a_string)
     *
     * @param string $str
     *
     * @return string
     */
    private function fromCamelCaseToSnakeCase(string $str): string
    {
        $str[0] = strtolower($str[0]);

        return preg_replace_callback('/([A-Z])/',
            function ($str) {
                return "_" . strtolower($str[1]);
            }, $str);
    }
}