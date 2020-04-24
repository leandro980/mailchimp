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

abstract class AbstractMergeField
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
     * @var string
     */
    protected $value;

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
     * AbstractMergeField constructor.
     *
     * @param string $type
     *
     * @throws InvalidArgumentException
     */
    public function __construct(string $type)
    {
        if (!in_array($type, [AbstractMergeField::TYPE_ADDRESS, AbstractMergeField::TYPE_BIRTHDAY,
            AbstractMergeField::TYPE_DATE, AbstractMergeField::TYPE_DROPDOWN, AbstractMergeField::TYPE_IMAGE_URL,
            AbstractMergeField::TYPE_NUMBER, AbstractMergeField::TYPE_PHONE, AbstractMergeField::TYPE_RADIO,
            AbstractMergeField::TYPE_TEXT, AbstractMergeField::TYPE_URL, AbstractMergeField::TYPE_ZIP])) {
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
     * @param $value
     *
     * @return $this
     */
    public function setValue($value): self
    {
        $this->value = $value;

        return $this;
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
     * @return AbstractMergeField
     */
    public function setName(string $name): AbstractMergeField
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
     * @return AbstractMergeField
     */
    public function setRequired(bool $required): AbstractMergeField
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
     * @return AbstractMergeField
     */
    public function setDefaultValue(?string $defaultValue): AbstractMergeField
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
     * @return AbstractMergeField
     */
    public function setPublic(bool $public): AbstractMergeField
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
     * @return AbstractMergeField
     */
    public function setOptions(?Options $options): AbstractMergeField
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
     * @return AbstractMergeField
     */
    public function setHelpText(string $helpText): AbstractMergeField
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

    /**
     * @return string|null
     */
    abstract public function getValue();
}