<?php
/**
 * Project: mailchimp
 * User: Leandro Luccerini <leandro.luccerini@gmail.com>
 * Date: 23/04/20
 * Time: 09:12
 */

namespace Szopen\Mailchimp\Helper\Transformer\Audience;


use Karriere\JsonDecoder\Bindings\ArrayBinding;
use Karriere\JsonDecoder\Bindings\FieldBinding;
use Karriere\JsonDecoder\ClassBindings;
use Karriere\JsonDecoder\Transformer;
use Szopen\Mailchimp\Audience\AudienceList;
use Szopen\Mailchimp\Audience\Link;
use \Szopen\Mailchimp\Audience\Response\AudienceListsResponse;
use Szopen\Mailchimp\Audience\Response\Constraints;

class AudienceListsResponseTransformer implements Transformer
{

    /**
     * @inheritDoc
     */
    public function register(ClassBindings $classBindings)
    {
        $classBindings->register(new ArrayBinding("lists",
            "lists",
            AudienceList::class));
        $classBindings->register(new ArrayBinding("links",
            "_links",
            Link::class));
        
        $classBindings->register((new FieldBinding('constraints',
            'constraints',
            Constraints::class)));
    }

    /**
     * @inheritDoc
     */
    public function transforms()
    {
        return AudienceListsResponse::class;
    }
}