<?php
/**
 * Project: szopen\mailchimp
 *
 * Author: Leandro Luccerini <leandro.luccerini@gmail.com>
 * Created: 10/04/2020 10:05
 */

namespace Szopen\Mailchimp\Helper\Transformer\Audience;

use Karriere\JsonDecoder\Bindings\AliasBinding;
use Karriere\JsonDecoder\Bindings\ArrayBinding;
use Karriere\JsonDecoder\Bindings\CallbackBinding;
use Karriere\JsonDecoder\Bindings\DateTimeBinding;
use Karriere\JsonDecoder\Bindings\FieldBinding;
use Karriere\JsonDecoder\ClassBindings;
use Karriere\JsonDecoder\Transformer;
use Szopen\Mailchimp\Audience\AudienceList;
use Szopen\Mailchimp\Audience\CampaignDefaults;
use Szopen\Mailchimp\Audience\Contact;
use Szopen\Mailchimp\Audience\Link;
use Szopen\Mailchimp\Audience\Stats;

class AudienceListTransformer implements Transformer
{

    /**
     * @inheritDoc
     */
    public function register(ClassBindings $classBindings)
    {

        $classBindings->register(new FieldBinding("contact",
            "contact",
            Contact::class));
        $classBindings->register(new FieldBinding("campaignDefaults",
            "campaign_defaults",
            CampaignDefaults::class));
        $classBindings->register(new FieldBinding("stats",
            "stats",
            Stats::class));
        $classBindings->register(new ArrayBinding("links",
            "_links",
            Link::class));

        $classBindings->register(new DateTimeBinding('dateCreated',
            'date_created',
            false,
            \DateTime::ISO8601));
    }

    /**
     * @inheritDoc
     */
    public function transforms()
    {
        return AudienceList::class;
    }
}