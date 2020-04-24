<?php
/**
 * Project: mailchimp
 * User: Leandro Luccerini <leandro.luccerini@gmail.com>
 * Date: 24/04/20
 * Time: 09:37
 */

namespace Szopen\Mailchimp\Audience\Member;

/**
 * Class Stats
 * Open and click rates for this subscriber.
 *
 * @author Leandro Luccerini <leandro.luccerini@gmail.com>
 * @package Szopen\Mailchimp\Audience\Member
 */
class Stats
{

    /**
     * A subscriber's average open rate.
     *
     * @var float
     */
    private $avgOpenRate;

    /**
     * A subscriber's average clickthrough rate.
     *
     * @var float
     */
    private $avgClickRate;

    /**
     * Ecommerce stats for the list member if the list is attached to a store.
     *
     * @var EcommerceData
     */
    private $ecommerceData;

    /**
     * A subscriber's average open rate.
     *
     * @return float
     */
    public function getAvgOpenRate(): float
    {
        return $this->avgOpenRate;
    }

    /**
     * A subscriber's average clickthrough rate.
     *
     * @return float
     */
    public function getAvgClickRate(): float
    {
        return $this->avgClickRate;
    }

    /**
     * Ecommerce stats for the list member if the list is attached to a store.
     *
     * @return EcommerceData
     */
    public function getEcommerceData(): EcommerceData
    {
        return $this->ecommerceData;
    }

}