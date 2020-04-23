<?php
/**
 * Project: mailchimp
 * User: Leandro Luccerini <leandro.luccerini@gmail.com>
 * Date: 23/04/20
 * Time: 10:13
 */

namespace Szopen\Mailchimp\Audience\Response;


class Constraints
{
    /**
     * @var bool
     */
    private $mayCreate;

    /**
     * @var int
     */
    private $maxInstances;

    /**
     * @var int
     */
    private $currentTotalInstances;

    /**
     * May the user create additional instances of this resource?
     *
     * @return bool
     */
    public function isMayCreate(): bool
    {
        return $this->mayCreate;
    }

    /**
     * How many total instances of this resource are allowed?
     * This is independent of any filter conditions applied to the query.
     * As a special case, -1 indicates unlimited.
     *
     * @return int
     */
    public function getMaxInstances(): int
    {
        return $this->maxInstances;
    }

    /**
     * How many total instances of this resource are already in use?
     * This is independent of any filter conditions applied to the query.
     * Value may be larger than max_instances. As a special case, -1 is returned when access is unlimited.
     *
     * @return int
     */
    public function getCurrentTotalInstances(): int
    {
        return $this->currentTotalInstances;
    }
}