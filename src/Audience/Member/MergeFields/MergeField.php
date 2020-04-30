<?php
/**
 * Project: mailchimp
 * User: Leandro Luccerini <leandro.luccerini@gmail.com>
 * Date: 24/04/20
 * Time: 14:03
 */

namespace Szopen\Mailchimp\Audience\Member\MergeFields;


use InvalidArgumentException;
use Szopen\Mailchimp\Audience\Link;

class MergeField
{
    const TYPE_TEXT = 'text',
        TYPE_NUMBER = 'number',
        TYPE_ADDRESS = 'address',
        TYPE_PHONE = 'phone',
        TYPE_DATE = 'date',
        TYPE_URL = 'url',
        TYPE_IMAGE_URL = 'imageurl',
        TYPE_RADIO = 'radio',
        TYPE_DROPDOWN = 'dropdown',
        TYPE_BIRTHDAY = 'birthday',
        TYPE_ZIP = 'zip';

    /**
     * An unchanging id for the merge field.
     *
     * @var null|int
     */
    private $mergeId = null;

    /**
     * The type for the merge field.
     *
     * @var string
     */
    protected $type;

    /**
     * The tag used in Mailchimp campaigns and for the /members endpoint.
     *
     * @var string
     */
    protected $tag;

    /**
     * The name of the merge field.
     *
     * @var string
     */
    protected $name = '';

    /**
     * The boolean value if the merge field is required.
     *
     * @var bool
     */
    protected $required = false;

    /**
     * The default value for the merge field if null.
     *
     * @var null|string
     */
    protected $defaultValue = null;

    /**
     * Whether the merge field is displayed on the signup form.
     *
     * @var bool
     */
    protected $public = false;

    /**
     * The order that the merge field displays on the list signup form.
     *
     * @var int
     */
    protected $displayOrder = 0;

    /**
     * @var null|Options
     */
    protected $options = null;

    /**
     * Extra text to help the subscriber fill out the form.
     *
     * @var string
     */
    protected $helpText = '';

    /**
     * @var null|string
     */
    private $listId = null;

    /**
     * @var Link[]
     */
    private $links = [];

    /**
     * MergeField constructor.
     *
     * @param string $type
     *
     * @throws InvalidArgumentException
     */
    public function __construct(string $type)
    {
        if (!in_array($type, [MergeField::TYPE_ADDRESS, MergeField::TYPE_BIRTHDAY,
            MergeField::TYPE_DATE, MergeField::TYPE_DROPDOWN, MergeField::TYPE_IMAGE_URL,
            MergeField::TYPE_NUMBER, MergeField::TYPE_PHONE, MergeField::TYPE_RADIO,
            MergeField::TYPE_TEXT, MergeField::TYPE_URL, MergeField::TYPE_ZIP])) {
            throw new InvalidArgumentException("$type is not a valid MergeField type");
        }

        $this->type = $type;
        $this->value = null;
    }

    /**
     * @param string $tag
     *
     * @return $this
     */
    public function setTag(string $tag): self
    {
        $this->tag = $tag;

        return $this;
    }

    /**
     * @return string
     */
    public function getTag(): string
    {
        return $this->tag;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     *
     * @return MergeField
     */
    public function setName(string $name): MergeField
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return bool
     */
    public function isRequired(): bool
    {
        return $this->required;
    }

    /**
     * @param bool $required
     *
     * @return MergeField
     */
    public function setRequired(bool $required): MergeField
    {
        $this->required = $required;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getDefaultValue(): ?string
    {
        return $this->defaultValue;
    }

    /**
     * @param string|null $defaultValue
     *
     * @return MergeField
     */
    public function setDefaultValue(?string $defaultValue): MergeField
    {
        $this->defaultValue = $defaultValue;
        return $this;
    }

    /**
     * @return bool
     */
    public function isPublic(): bool
    {
        return $this->public;
    }

    /**
     * @param bool $public
     *
     * @return MergeField
     */
    public function setPublic(bool $public): MergeField
    {
        $this->public = $public;
        return $this;
    }

    /**
     * @return Options|null
     */
    public function getOptions(): ?Options
    {
        return $this->options;
    }

    /**
     * @param Options|null $options
     *
     * @return MergeField
     */
    public function setOptions(?Options $options): MergeField
    {
        $this->options = $options;
        return $this;
    }

    /**
     * @return string
     */
    public function getHelpText(): string
    {
        return $this->helpText;
    }

    /**
     * @param string $helpText
     *
     * @return MergeField
     */
    public function setHelpText(string $helpText): MergeField
    {
        $this->helpText = $helpText;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getMergeId(): ?int
    {
        return $this->mergeId;
    }

    /**
     * @return int
     */
    public function getDisplayOrder(): int
    {
        return $this->displayOrder;
    }

    /**
     * @return string|null
     */
    public function getListId(): ?string
    {
        return $this->listId;
    }

    /**
     * @return Link[]
     */
    public function getLinks(): array
    {
        return $this->links;
    }
}