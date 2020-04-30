<?php
/**
 * Project: mailchimp
 * User: Leandro Luccerini <leandro.luccerini@gmail.com>
 * Date: 30/04/20
 * Time: 10:07
 */

namespace Szopen\Mailchimp\Helper\Transformer\Audience\Member;


use DateTime;
use Karriere\JsonDecoder\Bindings\DateTimeBinding;
use Karriere\JsonDecoder\ClassBindings;
use Karriere\JsonDecoder\Transformer;
use Szopen\Mailchimp\Audience\Member\Tag;

class TagTransformer implements Transformer
{

    /**
     * @inheritDoc
     */
    public function register(ClassBindings $classBindings)
    {
        $classBindings->register(new DateTimeBinding('dateAdded',
            'date_added',
            DateTime::ISO8601 ));
    }

    /**
     * @inheritDoc
     */
    public function transforms()
    {
        return Tag::class;
    }
}