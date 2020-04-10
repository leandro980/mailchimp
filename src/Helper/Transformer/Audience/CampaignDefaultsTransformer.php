<?php
/**
 * Project: szopen\mailchimp
 *
 * Author: Leandro Luccerini <leandro.luccerini@gmail.com>
 * Created: 10/04/2020 12:38
 */

namespace Szopen\Mailchimp\Helper\Transformer\Audience;


use Karriere\JsonDecoder\Bindings\AliasBinding;
use Karriere\JsonDecoder\ClassBindings;
use Karriere\JsonDecoder\Transformer;
use Szopen\Mailchimp\Audience\CampaignDefaults;

class CampaignDefaultsTransformer implements Transformer
{

    /**
     * @inheritDoc
     */
    public function register(ClassBindings $classBindings)
    {
        $classBindings->register(new AliasBinding("fromName", "from_name"));
        $classBindings->register(new AliasBinding("fromEmail", "from_email"));
    }

    /**
     * @inheritDoc
     */
    public function transforms()
    {
        return CampaignDefaults::class;
    }
}