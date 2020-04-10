<?php
/**
 * Project: szopen\mailchimp
 *
 * Author: Leandro Luccerini <leandro.luccerini@gmail.com>
 * Created: 10/04/2020 15:02
 */

namespace Szopen\Mailchimp\Helper\Transformer\Audience;


use Karriere\JsonDecoder\Bindings\AliasBinding;
use Karriere\JsonDecoder\ClassBindings;
use Karriere\JsonDecoder\Transformer;
use Szopen\Mailchimp\Audience\Link;

class LinkTransformer implements Transformer
{

    /**
     * @inheritDoc
     */
    public function register(ClassBindings $classBindings)
    {
        $classBindings->register(new AliasBinding('targetSchema', 'target_schema'));
    }

    /**
     * @inheritDoc
     */
    public function transforms()
    {
        return Link::class;
    }
}