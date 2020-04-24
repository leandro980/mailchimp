<?php
/**
 * Project: mailchimp
 * User: Leandro Luccerini <leandro.luccerini@gmail.com>
 * Date: 24/04/20
 * Time: 09:48
 */

namespace Szopen\Mailchimp\Audience\Member;

use DateTime;
use Szopen\Mailchimp\Audience\Link;

/**
 * Class Note
 *
 * @author Leandro Luccerini <leandro.luccerini@gmail.com>
 * @package Szopen\Mailchimp\Audience\Member
 */
class Note
{
    /**
     * The note id.
     *
     * @var string
     */
    private $id;

    /**
     * The date and time the note was created in ISO 8601 format.
     *
     * @var DateTime
     */
    private $createdAt;

    /**
     * The author of the note.
     *
     * @var string
     */
    private $createdBy;

    /**
     * The date and time the note was last updated in ISO 8601 format.
     *
     * @var DateTime
     */
    private $updatedAt;

    /**
     * The content of the note
     *
     * @var string
     */
    private $note;

    /**
     * The unique id for the list.
     *
     * @var string
     */
    private $listId;

    /**
     * The MD5 hash of the lowercase version of the list member's email address.
     *
     * @var string
     */
    private $emailId;

    /**
     * A list of link types and descriptions for the API schema documents.
     *
     * @var Link[]
     */
    private $links;

    /**
     * The note id.
     *
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * The date and time the note was created in ISO 8601 format.
     * @return DateTime
     */
    public function getCreatedAt(): DateTime
    {
        return $this->createdAt;
    }

    /**
     * The author of the note.
     *
     * @return string
     */
    public function getCreatedBy(): string
    {
        return $this->createdBy;
    }

    /**
     * The date and time the note was last updated in ISO 8601 format.
     *
     * @return DateTime
     */
    public function getUpdatedAt(): DateTime
    {
        return $this->updatedAt;
    }

    /**
     * The content of the note
     *
     * @return string
     */
    public function getNote(): string
    {
        return $this->note;
    }

    /**
     * The unique id for the list.
     *
     * @return string
     */
    public function getListId(): string
    {
        return $this->listId;
    }

    /**
     * The MD5 hash of the lowercase version of the list member's email address.
     *
     * @return string
     */
    public function getEmailId(): string
    {
        return $this->emailId;
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
}