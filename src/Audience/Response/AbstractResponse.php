<?php
/**
 * Project: mailchimp
 * User: Leandro Luccerini <leandro.luccerini@gmail.com>
 * Date: 30/04/20
 * Time: 14:39
 */

namespace Szopen\Mailchimp\Audience\Response;


use Iterator;
use Szopen\Mailchimp\Audience\Link;

abstract class AbstractResponse implements Iterator
{

    /**
     * @var array
     */
    protected $elements;

    /**
     * @var int
     */
    protected $currentIndex = 0;

    /**
     * @var int
     */
    protected $totalItems;

    /**
     * @var array
     */
    protected $links;

    /**
     * The elements array
     *
     * @return array
     */
    public function getElements(): array
    {
        return $this->elements;
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
     * A list of link types and descriptions for the API schema documents.
     *
     * @return Link[]
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
        return $this->elements[$this->currentIndex];
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
        return isset($this->elements[$this->currentIndex]);
    }

    /**
     *
     */
    public function rewind()
    {
        $this->currentIndex = 0;
    }
}