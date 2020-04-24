<?php
/**
 * Project: mailchimp
 * User: Leandro Luccerini <leandro.luccerini@gmail.com>
 * Date: 24/04/20
 * Time: 10:04
 */

namespace Szopen\Mailchimp\Audience\Member;

use DateTime;

/**
 * Class Tag
 *
 * @author Leandro Luccerini <leandro.luccerini@gmail.com>
 * @package Szopen\Mailchimp\Audience\Member
 */
class Tag
{
    /**
     * The unique id for the tag.
     *
     * @var int
     */
    private $id;

    /**
     * The name of the tag.
     *
     * @var string
     */
    private $name;

    /**
     * The date and time the tag was added to the list member in ISO 8601 format.
     *
     * @var DateTime
     */
    private $dateAdded;

    /**
     * The name of the tag.
     *
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     *
     * @return Tag
     */
    public function setName(string $name): Tag
    {
        $this->name = $name;
        return $this;
    }

    /**
     * The unique id for the tag.
     *
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * The date and time the tag was added to the list member in ISO 8601 format.
     *
     * @return DateTime
     */
    public function getDateAdded(): DateTime
    {
        return $this->dateAdded;
    }
}