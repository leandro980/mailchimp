<?php
/**
 * Project: mailchimp
 * User: Leandro Luccerini <leandro.luccerini@gmail.com>
 * Date: 23/04/20
 * Time: 08:56
 */

namespace Szopen\Mailchimp\Audience\Response;

use Szopen\Mailchimp\Audience\AudienceList;

class AudienceListsResponse extends AbstractResponse
{

    /**
     * @var Constraints
     */
    private $constraints;

    /**
     * AudienceListsResponse constructor.
     *
     * @param array $lists
     */
    public function __construct(array $lists = [])
    {
        $this->currentIndex = 0;

        foreach ($lists as $l) {
            $this->addAudience($l);
        }
    }

    /**
     * @param AudienceList $audienceList
     *
     * @return $this
     */
    public function addAudience(AudienceList $audienceList): self
    {
        $this->elements[] = $audienceList;
        return $this;
    }


    /**
     * @return Constraints
     */
    public function getConstraints(): Constraints
    {
        return $this->constraints;
    }
}