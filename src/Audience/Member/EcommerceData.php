<?php
/**
 * Project: mailchimp
 * User: Leandro Luccerini <leandro.luccerini@gmail.com>
 * Date: 24/04/20
 * Time: 09:38
 */

namespace Szopen\Mailchimp\Audience\Member;

/**
 * Class EcommerceData
 * Ecommerce stats for the list member if the list is attached to a store.
 *
 * @author Leandro Luccerini <leandro.luccerini@gmail.com>
 * @package Szopen\Mailchimp\Audience\Member
 */
class EcommerceData
{
    /**
     * @var float
     */
    private $totalRevenue;

    /**
     * @var int
     */
    private $numberOfOrders;

    /**
     * @var string
     */
    private $currencyCode;

    /**
     * @return float
     */
    public function getTotalRevenue(): float
    {
        return $this->totalRevenue;
    }

    /**
     * @return int
     */
    public function getNumberOfOrders(): int
    {
        return $this->numberOfOrders;
    }

    /**
     * @return string
     */
    public function getCurrencyCode(): string
    {
        return $this->currencyCode;
    }
}