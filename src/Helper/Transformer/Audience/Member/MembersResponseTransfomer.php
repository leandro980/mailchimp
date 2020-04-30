<?php
/**
 * Project: mailchimp
 * User: Leandro Luccerini <leandro.luccerini@gmail.com>
 * Date: 30/04/20
 * Time: 14:47
 */

namespace Szopen\Mailchimp\Helper\Transformer\Audience\Member;


use Karriere\JsonDecoder\Bindings\ArrayBinding;
use Karriere\JsonDecoder\ClassBindings;
use Karriere\JsonDecoder\Transformer;
use Szopen\Mailchimp\Audience\Link;
use Szopen\Mailchimp\Audience\Member\Member;
use Szopen\Mailchimp\Audience\Response\MembersResponse;

class MembersResponseTransfomer implements Transformer
{

    /**
     * @inheritDoc
     */
    public function register(ClassBindings $classBindings)
    {
        $classBindings->register(new ArrayBinding("elements",
            "members",
            Member::class));
        $classBindings->register(new ArrayBinding("links",
            "_links",
            Link::class));
    }

    /**
     * @inheritDoc
     */
    public function transforms()
    {
        return MembersResponse::class;
    }
}