<?php
/**
 * Project: mailchimp
 * User: Leandro Luccerini <leandro.luccerini@gmail.com>
 * Date: 24/04/20
 * Time: 10:32
 */

namespace Szopen\Mailchimp\Audience\Member;


use JsonSerializable;
use Szopen\Mailchimp\Audience\Member\MergeFields\AbstractMergeField;
use Szopen\Mailchimp\Helper\JsonSerialiazerTrait;

/**
 * Class Member
 *
 * @author Leandro Luccerini <leandro.luccerini@gmail.com>
 * @package Szopen\Mailchimp\Audience\Member
 */
class Member implements JsonSerializable
{
    use JsonSerialiazerTrait;

    const EMAIL_TEXT = 'text';
    const EMAIL_HTML = 'html';

    const STATUS_SUBSCRIBED = 'subscribed';
    const STATUS_UNSUBSCRIBED = 'unsubscribed';
    const STATUS_CLEANED = 'cleaned';
    const STATUS_PENDING = 'pending';
    const STATUS_TRANSACTIONAL = 'transactional';
    const STATUS_ARCHIVED = 'archived';

    /**
     * The MD5 hash of the lowercase version of the list member's email address.
     *
     * @var string
     */
    private $id;

    /**
     * Email address for a subscriber.
     *
     * @var string
     */
    private $emailAddress;

    /**
     * An identifier for the address across all of Mailchimp.
     *
     * @var string
     */
    private $uniqueEmailId;

    /**
     * The ID used in the Mailchimp web application.
     * View this member in your Mailchimp account at https://{dc}.admin.mailchimp.com/lists/members/view?id={web_id}.
     *
     * @var string
     */
    private $webId;

    /**
     * Type of email this member asked to get ('html' or 'text').
     *
     * @var string
     */
    private $emailType;

    /**
     * Subscriber's current status.
     *
     * @var string
     */
    private $status;

    /**
     * A subscriber's reason for unsubscribing.
     *
     * @var string
     */
    private $unsubscribeReason;

    /**
     * An individual merge var and value for a member.
     *
     * @var AbstractMergeField[];
     */
    private $mergeFields;

    /**
     * The key of this object's properties is the ID of the interest in question.
     *
     * @var
     */
    private $interest;

    /*

interests
type:
Object
title:
Subscriber Interests
read only:
False
The key of this object's properties is the ID of the interest in question.

stats
type:
Object
title:
Subscriber Stats
read only:
True
Open and click rates for this subscriber.


ip_signup
type:
String
title:
Signup IP
read only:
True
IP address the subscriber signed up from.

timestamp_signup
type:
String
title:
Signup Timestamp
read only:
True
The date and time the subscriber signed up for the list in ISO 8601 format.

ip_opt
type:
String
title:
Opt-in IP
read only:
True
The IP address the subscriber used to confirm their opt-in status.

timestamp_opt
type:
String
title:
Opt-in Timestamp
read only:
True
The date and time the subscribe confirmed their opt-in status in ISO 8601 format.

member_rating
type:
Integer
title:
Member Rating
read only:
True
Star rating for this member, between 1 and 5.

last_changed
type:
String
title:
Last Changed Date
read only:
True
The date and time the member's info was last changed in ISO 8601 format.

language
type:
String
title:
Language
read only:
False
If set/detected, the subscriber's language.

vip
type:
Boolean
title:
VIP
read only:
False
VIP status for subscriber.

email_client
type:
String
title:
Email Client
read only:
True
The list member's email client.

location
type:
Object
title:
Location
read only:
False
Subscriber location information.


marketing_permissions
type:
Array
title:
Marketing Permissions
read only:
False
The marketing permissions for the subscriber.


last_note
type:
Object
title:
Notes
read only:
True
The most recent Note added about this member.


source
type:
String
title:
Subscriber Source
read only:
True
The source from which the subscriber was added to this list.

tags_count
type:
Integer
title:
Tags Count
read only:
True
The number of tags applied to this member.

tags
type:
Array
title:
Tags
read only:
True
Returns up to 50 tags applied to this member. To retrieve all tags see Member Tags.


list_id
type:
String
title:
List ID
read only:
True
The list id.

_links
type:
Array
title:
Links
read only:
True
A list of link types and descriptions for the API schema documents.
     */

}