<?php
/**
 * Project: mailchimp
 * User: Leandro Luccerini <leandro.luccerini@gmail.com>
 * Date: 23/04/20
 * Time: 08:56
 */

namespace Szopen\Mailchimp\Audience\Response;


use Iterator;
use Szopen\Mailchimp\Audience\AudienceList;

class AudienceListsResponse implements Iterator
{

    /**
     * @var array
     */
    private $lists;

    /**
     * @var int
     */
    private $currentIndex = 0;

    /**
     * @var int
     */
    private $totalItems;

    /**
     * @var array
     */
    private $links;

    /**
     * @var Constraints
     */
    private $constraints;

    /**
     * AudienceListsResponse constructor.
     *
     * @param array $lists
     */
    public function __construct(array $lists = [])
    {
        $this->currentIndex = 0;

        foreach ($lists as $l) {
            $this->addAudience($l);
        }
    }

    /**
     * @param AudienceList $audienceList
     *
     * @return $this
     */
    public function addAudience(AudienceList $audienceList): self
    {
        $this->lists[] = $audienceList;
        return $this;
    }

    /**
     * The AudienceList[] array
     *
     * @return array
     */
    public function getLists(): array
    {
        return $this->lists;
    }

    /**
     * The total number of items matching the query regardless of pagination.
     *
     * @return int
     */
    public function getTotalItems(): int
    {
        return $this->totalItems;
    }

    /**
     * @return Constraints
     */
    public function getConstraints(): Constraints
    {
        return $this->constraints;
    }

    /**
     * A list of link types and descriptions for the API schema documents.
     *
     * @return array
     */
    public function getLinks(): array
    {
        return $this->links;
    }

    /**
     * @return mixed
     */
    public function current()
    {
        return $this->lists[$this->currentIndex];
    }

    /**
     *
     */
    public function next()
    {
        ++$this->currentIndex;
    }

    /**
     * @return bool|float|int|string|null
     */
    public function key()
    {
        return $this->currentIndex;
    }

    /**
     * @return bool
     */
    public function valid()
    {
        return isset($this->lists[$this->currentIndex]);
    }

    /**
     *
     */
    public function rewind()
    {
        $this->currentIndex = 0;
    }
}