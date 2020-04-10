<?php
/**
 * Project: szopen\mailchimp
 *
 * Author: Leandro Luccerini <leandro.luccerini@gmail.com>
 * Created: 10/04/2020 16:11
 */

namespace Szopen\Mailchimp\Helper\Transformer\Audience;


use Karriere\JsonDecoder\Bindings\AliasBinding;
use Karriere\JsonDecoder\Bindings\CallbackBinding;
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
        $classBindings->register(new AliasBinding("memberCount",
            "member_count"));
        $classBindings->register(new AliasBinding("totalContacts",
            "total_contacts"));
        $classBindings->register(new AliasBinding("unsubscribeCount",
            "unsubscribe_count"));
        $classBindings->register(new AliasBinding("cleanedCount",
            "cleaned_count"));
        $classBindings->register(new AliasBinding("memberCountSinceSend",
            "member_count_since_send"));
        $classBindings->register(new AliasBinding("cleanedCountSinceSend",
            "cleaned_count_since_send"));
        $classBindings->register(new AliasBinding("unsubscribeCountSinceSend",
            "unsubscribe_count_since_send"));
        $classBindings->register(new AliasBinding("campaignCount",
            "campaign_count"));
        $classBindings->register(new AliasBinding("mergeFieldCount",
            "merge_field_count"));
        $classBindings->register(new AliasBinding("avgSubRate",
            "avg_sub_rate"));
        $classBindings->register(new AliasBinding("avgUnsubRate",
            "avg_unsub_rate"));
        $classBindings->register(new AliasBinding("targetSubRate",
            "target_sub_rate"));
        $classBindings->register(new AliasBinding("openRate",
            "open_rate"));
        $classBindings->register(new AliasBinding("clickRate",
            "click_rate"));

        $classBindings->register(new CallbackBinding('campaignLastSent', function ($data){
            try{
                return new \DateTime($data['campaign_last_sent']);
            }
            catch (\Exception $e){
                return null;
            }
        }));
        $classBindings->register(new CallbackBinding('lastSubDate', function ($data){
            try{
                return new \DateTime($data['last_sub_date']);
            }
            catch (\Exception $e){
                return null;
            }
        }));
        $classBindings->register(new CallbackBinding('lastUnsubDate', function ($data){
            try{
                return new \DateTime($data['last_unsub_date']);
            }
            catch (\Exception $e){
                return null;
            }
        }));

    }

    /**
     * @inheritDoc
     */
    public function transforms()
    {
        return Stats::class;
    }
}