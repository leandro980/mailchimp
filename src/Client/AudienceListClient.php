<?php
/**
 * Project: szopen\mailchimp
 *
 * Author: Leandro Luccerini <leandro.luccerini@gmail.com>
 * Created: 10/04/2020 09:10
 */

namespace Szopen\Mailchimp\Client;

use DrewM\MailChimp\MailChimp;
use Exception;
use Karriere\JsonDecoder\Exceptions\InvalidBindingException;
use Karriere\JsonDecoder\Exceptions\InvalidJsonException;
use Karriere\JsonDecoder\Exceptions\JsonValueException;
use Karriere\JsonDecoder\Exceptions\NotExistingRootException;
use Karriere\JsonDecoder\JsonDecoder;
use Szopen\Mailchimp\Audience\AudienceList;
use Szopen\Mailchimp\Exception\InvalidListException;
use Szopen\Mailchimp\Helper\Transformer\Audience\AudienceListTransformer;
use Szopen\Mailchimp\Helper\Transformer\Audience\StatsTransformer;

/**
 * Class AudienceListClient
 *
 * This is a wrapper, of thinkshout/mailchimp-api-php MailChimpLists, that performs data transformations
 */
class AudienceListClient
{

    const LISTS_METHOD = '/lists';

    const LIST_ID_METHOD = '/lists/%s';

    /**
     * @var MailChimp
     */
    private $mcc;

    /**
     * AudienceListClient constructor.
     *
     * @param string $apiKey
     *
     * @throws Exception
     * @see https://github.com/thinkshout/mailchimp-api-php/blob/master/src/MailchimpLists.php
     */
    public function __construct(string $apiKey)
    {
        $this->mcc = new MailChimp($apiKey);
    }

    /**
     * @param string $listId
     *
     * @return AudienceList
     *
     * @throws InvalidBindingException
     * @throws InvalidJsonException
     * @throws JsonValueException
     * @throws NotExistingRootException
     */
    public function getList(string $listId): ?AudienceList
    {

        $method = sprintf(self::LIST_ID_METHOD, $listId);
        $response = $this->mcc->get($method);

        $jsonString = json_encode($response);

        $transformer = new JsonDecoder(true);
        $transformer->register(new AudienceListTransformer());
        $transformer->register(new StatsTransformer());

        return $transformer->decode($jsonString, AudienceList::class);
    }

    /**
     * Determines if is a brand new list or an existing one and then post or edit the list
     *
     * @param AudienceList $list
     *
     * @throws InvalidListException
     */
    public function saveList(AudienceList $list)
    {
        // Patch/Edit an existing List
        if(null !== $list->getId()){
            $method = sprintf(self::LIST_ID_METHOD, $list->getId());
            $response = $this->mcc->patch($method, $list->jsonSerialize());
        }
        // Saves a brand new List
        else {
            $response = $this->mcc->post(self::LISTS_METHOD, $list->jsonSerialize());
        }

        // If there was an error throws an exception
        if(false === $response){
            throw new InvalidListException($this->mcc->getLastError());
        }
    }

    /**
     * @param array $parameters
     *
     * @return array
     * @throws InvalidBindingException
     * @throws InvalidJsonException
     * @throws JsonValueException
     * @throws NotExistingRootException
     */
    public function getLists(array $parameters = []): array
    {

        $method = "/lists";
        $response = $this->mcc->get($method);

        $jsonString = json_encode($response);

        $transformer = new JsonDecoder();
        $transformer->register(new AudienceListTransformer());
        $transformer->register(new StatsTransformer());

        return $transformer->decodeMultiple($jsonString, AudienceList::class, 'lists');
    }
}