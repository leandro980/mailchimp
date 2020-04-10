<?php
/**
 * Project: szopen\mailchimp
 *
 * Author: Leandro Luccerini <leandro.luccerini@gmail.com>
 * Created: 10/04/2020 09:10
 */

namespace Szopen\Mailchimp\Client;

use Karriere\JsonDecoder\JsonDecoder;
use Mailchimp\http\MailchimpHttpClientInterface;
use Mailchimp\MailchimpAPIException;
use Mailchimp\MailchimpLists;
use Szopen\Mailchimp\Audience\AudienceList;
use Szopen\Mailchimp\Helper\Transformer\Audience\AudienceListTransformer;
use Szopen\Mailchimp\Helper\Transformer\Audience\CampaignDefaultsTransformer;
use Szopen\Mailchimp\Helper\Transformer\Audience\LinkTransformer;
use Szopen\Mailchimp\Helper\Transformer\Audience\StatsTransformer;

/**
 * Class AudienceListClient
 *
 * This is a wrapper, of thinkshout/mailchimp-api-php MailChimpLists, that performs data transformations
 */
class AudienceListClient
{

    /**
     * @var MailchimpLists
     */
    private $thinkShoutManager;

    /**
     * AudienceListClient constructor.
     *
     * @param string $apiKey
     * @param string $apiUser
     * @param array $httpOption
     * @param MailchimpHttpClientInterface|null $client
     *
     * @see https://github.com/thinkshout/mailchimp-api-php/blob/master/src/MailchimpLists.php
     */
    public function __construct(string $apiKey,
                                string $apiUser = 'apikey',
                                array $httpOption = [],
                                MailchimpHttpClientInterface $client = null)
    {
        $this->thinkShoutManager = new MailchimpLists($apiKey,
            $apiUser,
            $httpOption,
            $client);
    }

    /**
     * @param string $listId
     *
     * @return AudienceList
     *
     * @throws MailchimpAPIException
     */
    public function getList(string $listId): AudienceList
    {
        $stdObj = $this->thinkShoutManager->getList($listId);

        $jsonObj = json_encode($stdObj);

        $transformer = new JsonDecoder(true, true);
        $transformer->register(new AudienceListTransformer());
        $transformer->register(new CampaignDefaultsTransformer());
        $transformer->register(new LinkTransformer());
        $transformer->register(new StatsTransformer());

        return $transformer->decode($jsonObj, AudienceList::class);
    }
}