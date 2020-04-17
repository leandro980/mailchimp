<?php
/**
 * Project: szopen\mailchimp
 *
 * Author: Leandro Luccerini <leandro.luccerini@gmail.com>
 * Created: 10/04/2020 16:11
 */

namespace Szopen\Mailchimp\Helper\Transformer\Audience;


use Karriere\JsonDecoder\Bindings\AliasBinding;
use Karriere\JsonDecoder\Bindings\DateTimeBinding;
use Karriere\JsonDecoder\ClassBindings;
use Karriere\JsonDecoder\Transformer;
use Szopen\Mailchimp\Audience\Stats;

class StatsTransformer implements Transformer
{

    /**
     * @inheritDoc
     */
    public function register(ClassBindings $classBindings)
    {
        $classBindings->register(new DateTimeBinding('campaignLastSent',
            'campaign_last_sent',
            false,
            \DateTime::ISO8601));
        $classBindings->register(new DateTimeBinding('lastSubDate',
            'last_sub_date',
            false,
            \DateTime::ISO8601));
        $classBindings->register(new DateTimeBinding('lastUnsubDate',
            'last_unsub_date',
            false,
            \DateTime::ISO8601));
    }

    /**
     * @inheritDoc
     */
    public function transforms()
    {
        return Stats::class;
    }
}