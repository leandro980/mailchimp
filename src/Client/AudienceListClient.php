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
use Szopen\Mailchimp\Audience\Member\Member;
use Szopen\Mailchimp\Audience\Response\AudienceListsResponse;
use Szopen\Mailchimp\Audience\Response\MembersResponse;
use Szopen\Mailchimp\Exception\InvalidListException;
use Szopen\Mailchimp\Exception\InvalidMemeberException;
use Szopen\Mailchimp\Filters\Filter;
use Szopen\Mailchimp\Helper\Transformer\Audience\AudienceListsResponseTransformer;
use Szopen\Mailchimp\Helper\Transformer\Audience\AudienceListTransformer;
use Szopen\Mailchimp\Helper\Transformer\Audience\Member\MembersResponseTransfomer;
use Szopen\Mailchimp\Helper\Transformer\Audience\Member\MemberTransformer;
use Szopen\Mailchimp\Helper\Transformer\Audience\Member\NoteTransformer;
use Szopen\Mailchimp\Helper\Transformer\Audience\Member\TagTransformer;
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

    const LIST_MEMBER_METHOD = '/lists/%s/members/%s';
    const LIST_MEMBERS_METHOD = '/lists/%s/members';

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
     * Get information about a specific list in your Mailchimp account.
     * Results include list members who have signed up but haven't confirmed
     * their subscription yet and unsubscribed or cleaned.
     *
     * @param string $listId
     * @param Filter|null $filters
     *
     * @return AudienceList|null
     *
     * @throws InvalidBindingException
     * @throws InvalidJsonException
     * @throws InvalidListException
     * @throws JsonValueException
     * @throws NotExistingRootException
     */
    public function getList(string $listId, Filter $filters = null): ?AudienceList
    {

        $parameters = [];

        if(null !== $filters){
            $parameters = $filters->getParametersArray();
        }

        $method = sprintf(self::LIST_ID_METHOD, $listId);
        $response = $this->mcc->get($method, $parameters);

        // If there was an error throws an exception
        if(false === $response){
            throw new InvalidListException($this->mcc->getLastError());
        }

        $jsonString = json_encode($response);

        $transformer = new JsonDecoder(true);
        $transformer->register(new AudienceListTransformer());
        $transformer->register(new StatsTransformer());

        return $transformer->decode($jsonString, AudienceList::class);
    }

    /**
     * Create a new list in your Mailchimp account or update the settings for a specific list.
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
     * Get information about all lists in the account.
     *
     * @param Filter|null $filters List of parameters to filter results
     *
     * @return AudienceListsResponse
     *
     * @throws InvalidBindingException
     * @throws InvalidJsonException
     * @throws InvalidListException
     * @throws JsonValueException
     * @throws NotExistingRootException
     */
    public function getLists(Filter $filters = null): AudienceListsResponse
    {

        $parameters = [];

        if(null !== $filters){
            $parameters = $filters->getParametersArray();
        }

        $method = "/lists";
        $response = $this->mcc->get($method, $parameters);

        // If there was an error throws an exception
        if(false === $response){
            throw new InvalidListException($this->mcc->getLastError());
        }

        $jsonString = json_encode($response);

        $transformer = new JsonDecoder(true);

        $transformer->register(new AudienceListsResponseTransformer());
        $transformer->register(new AudienceListTransformer());
        $transformer->register(new StatsTransformer());

        return $transformer->decode($jsonString, AudienceListsResponse::class);
    }

    /**
     * Delete a list from your Mailchimp account.
     * If you delete a list, you'll lose the list history—including subscriber activity, unsubscribes,
     * complaints, and bounces.
     * You’ll also lose subscribers’ email addresses, unless you exported and backed up your list.
     *
     * @param AudienceList $list
     *
     * @throws InvalidListException
     */
    public function deleteList(AudienceList $list)
    {
        $method = sprintf(self::LIST_ID_METHOD, $list->getId());
        $response = $this->mcc->delete($method);

        // If there was an error throws an exception
        if(false === $response){
            throw new InvalidListException($this->mcc->getLastError());
        }
    }

    /**
     * Get information about a specific list member, including a currently subscribed, unsubscribed, or bounced member.
     *
     * @param string $email
     * @param string $listId
     * @param Filter|null $filters
     *
     * @return Member|null
     * @throws InvalidBindingException
     * @throws InvalidJsonException
     * @throws InvalidListException
     * @throws JsonValueException
     * @throws NotExistingRootException
     */
    public function getMemeberByEmail(string $email, string $listId, Filter $filters = null): ?Member
    {
        $hash = MailChimp::subscriberHash($email);

        return $this->getMember($hash, $listId, $filters);
    }

    /**
     * Get information about a specific list member, including a currently subscribed, unsubscribed, or bounced member.
     *
     * @param string $hash
     * @param string $listId
     * @param Filter|null $filters
     *
     * @return Member|null
     * @throws InvalidBindingException
     * @throws InvalidJsonException
     * @throws InvalidListException
     * @throws JsonValueException
     * @throws NotExistingRootException
     */
    public function getMember(string $hash, string $listId, Filter $filters = null): ?Member
    {
        $method = sprintf(self::LIST_MEMBER_METHOD, $listId, $hash);

        $parameters = [];

        if(null !== $filters){
            $parameters = $filters->getParametersArray();
        }

        $response = $this->mcc->get($method, $parameters);

        // If there was an error throws an exception
        if(false === $response){
            throw new InvalidListException($this->mcc->getLastError());
        }

        $jsonString = json_encode($response);

        $transformer = new JsonDecoder(true);
        $transformer->register(new MemberTransformer());
        $transformer->register(new NoteTransformer());
        $transformer->register(new TagTransformer());


        $member = $transformer->decode($jsonString, Member::class);

        if($member->getStatus() == 404){
            return null;
        }

        return $member;
    }

    /**
     * Get information about members in a specific Mailchimp list.
     *
     * @param AudienceList $list
     * @param Filter|null $filters
     *
     * @return MembersResponse
     * @throws InvalidBindingException
     * @throws InvalidJsonException
     * @throws InvalidListException
     * @throws JsonValueException
     * @throws NotExistingRootException
     */
    public function getMembers(AudienceList $list, Filter $filters = null): MembersResponse
    {
        return $this->getMembersByListId($list->getId(), $filters);
    }

    /**
     * Get information about members in a specific Mailchimp list.
     *
     * @param string $listId
     * @param Filter|null $filters
     *
     * @return MembersResponse
     * @throws InvalidBindingException
     * @throws InvalidJsonException
     * @throws InvalidListException
     * @throws JsonValueException
     * @throws NotExistingRootException
     */
    public function getMembersByListId(string $listId, Filter $filters = null): MembersResponse
    {
        $method = sprintf(self::LIST_MEMBERS_METHOD, $listId);

        $parameters = [];

        if(null !== $filters){
            $parameters = $filters->getParametersArray();
        }

        $response = $this->mcc->get($method, $parameters);

        // If there was an error throws an exception
        if(false === $response){
            throw new InvalidListException($this->mcc->getLastError());
        }

        $jsonString = json_encode($response);

        $transformer = new JsonDecoder(true);
        $transformer->register(new MembersResponseTransfomer());
        $transformer->register(new MemberTransformer());
        $transformer->register(new NoteTransformer());
        $transformer->register(new TagTransformer());

        return $transformer->decode($jsonString, MembersResponse::class);
    }

    /**
     * Archive a list member
     *
     * @param Member $member
     *
     * @throws InvalidMemeberException
     */
    public function deleteMember(Member $member)
    {
        $this->deleteMemberByHash($member->getId(), $member->getListId());
    }

    /**
     * Archive a list member
     *
     * @param string $email
     * @param string $listId
     *
     * @throws InvalidMemeberException
     */
    public function deleteMemberByEmail(string $email, string $listId){

        $hash = MailChimp::subscriberHash($email);
        $this->deleteMemberByHash($hash, $listId);
    }

    /**
     * Archive a list member
     *
     * @param string $hash
     * @param string $listId
     *
     * @throws InvalidMemeberException
     */
    public function deleteMemberByHash(string $hash, string $listId)
    {
        $method = sprintf(self::LIST_MEMBER_METHOD, $listId, $hash);
        $response = $this->mcc->delete($method);

        // If there was an error throws an exception
        if(false === $response){
            throw new InvalidMemeberException($this->mcc->getLastError());
        }
    }
}