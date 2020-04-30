<?php
/**
 * Project: mailchimp
 * User: Leandro Luccerini <leandro.luccerini@gmail.com>
 * Date: 30/04/20
 * Time: 09:22
 */

namespace Szopen\Mailchimp\Helper\Transformer\Audience\Member;


use DateTime;
use Karriere\JsonDecoder\Bindings\ArrayBinding;
use Karriere\JsonDecoder\Bindings\CallbackBinding;
use Karriere\JsonDecoder\Bindings\DateTimeBinding;
use Karriere\JsonDecoder\Bindings\FieldBinding;
use Karriere\JsonDecoder\ClassBindings;
use Karriere\JsonDecoder\Transformer;
use Szopen\Mailchimp\Audience\Link;
use Szopen\Mailchimp\Audience\Member\Location;
use Szopen\Mailchimp\Audience\Member\MarketingPermission;
use Szopen\Mailchimp\Audience\Member\Member;
use Szopen\Mailchimp\Audience\Member\Note;
use Szopen\Mailchimp\Audience\Member\Stats;
use Szopen\Mailchimp\Audience\Member\Tag;

class MemberTransformer implements Transformer
{

    /**
     * @inheritDoc
     */
    public function register(ClassBindings $classBindings)
    {

        $classBindings->register(new DateTimeBinding('lastChanged',
            'last_changed',
            false,
            DateTime::ISO8601));
        $classBindings->register(new DateTimeBinding('timestampOpt',
            'timestamp_opt',
            false,
            DateTime::ISO8601));
        $classBindings->register(new DateTimeBinding('timpestampSignup',
            'timpestamp_signup',
            false,
            DateTime::ISO8601));

        $classBindings->register(new FieldBinding('lastNote',
            'last_note',
            Note::class));
        $classBindings->register(new FieldBinding('location',
            'location',
            Location::class));
        $classBindings->register(new FieldBinding('marketingPermissions',
            'marketing_permissions',
            MarketingPermission::class));
        $classBindings->register(new FieldBinding('stats',
            'stats',
            Stats::class));

        $classBindings->register(new ArrayBinding("links",
            "_links",
            Link::class));

        $classBindings->register(new CallbackBinding('tags', function ($data){
            $tags = [];

            foreach ($data['tags'] as $tag){
                $tags[] = new Tag($tag['name'], $tag['id']);
            }

            return $tags;
        }));
    }

    /**
     * @inheritDoc
     */
    public function transforms()
    {
        return Member::class;
    }
}