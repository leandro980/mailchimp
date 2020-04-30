<?php
/**
 * Project: mailchimp
 * User: Leandro Luccerini <leandro.luccerini@gmail.com>
 * Date: 30/04/20
 * Time: 09:54
 */

namespace Szopen\Mailchimp\Helper\Transformer\Audience\Member;


use DateTime;
use Karriere\JsonDecoder\Bindings\ArrayBinding;
use Karriere\JsonDecoder\Bindings\DateTimeBinding;
use Karriere\JsonDecoder\ClassBindings;
use Karriere\JsonDecoder\Transformer;
use Szopen\Mailchimp\Audience\Link;
use Szopen\Mailchimp\Audience\Member\Note;

class NoteTransformer implements Transformer
{

    /**
     * @inheritDoc
     */
    public function register(ClassBindings $classBindings)
    {
        $classBindings->register(new DateTimeBinding('createdAt',
            'created_at',
            false,
            DateTime::ISO8601 ));
        $classBindings->register(new DateTimeBinding('updatedAt',
            'updated_at',
            false,
            DateTime::ISO8601 ));

        $classBindings->register(new ArrayBinding('links',
            '_links',
            Link::class));
    }

    /**
     * @inheritDoc
     */
    public function transforms()
    {
        return Note::class;
    }
}