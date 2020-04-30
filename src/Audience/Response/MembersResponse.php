<?php
/**
 * Project: mailchimp
 * User: Leandro Luccerini <leandro.luccerini@gmail.com>
 * Date: 30/04/20
 * Time: 14:43
 */

namespace Szopen\Mailchimp\Audience\Response;


use Szopen\Mailchimp\Audience\Member\Member;

class MembersResponse extends AbstractResponse
{
    /**
     * MembersResponse constructor.
     *
     * @param array $members
     */
    public function __construct(array $members = [])
    {
        $this->currentIndex = 0;

        foreach ($members as $l) {
            $this->addAudience($l);
        }
    }

    /**
     * @param Member $member
     *
     * @return $this
     */
    public function addAudience(Member $member): self
    {
        $this->elements[] = $member;
        return $this;
    }
}