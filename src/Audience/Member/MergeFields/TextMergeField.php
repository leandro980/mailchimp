<?php
/**
 * Project: mailchimp
 * User: Leandro Luccerini <leandro.luccerini@gmail.com>
 * Date: 24/04/20
 * Time: 17:29
 */

namespace Szopen\Mailchimp\Audience\Member\MergeFields;


class TextMergeField extends AbstractMergeField
{

    /**
     * TextMergeField constructor.
     *
     * @param string $value
     */
    public function __construct(string $value = '')
    {
        parent::__construct(parent::TYPE_TEXT);
        $this->setValue($value);
    }

    /**
     * @inheritDoc
     */
    public function getValue()
    {
       return $this->value;
    }
}