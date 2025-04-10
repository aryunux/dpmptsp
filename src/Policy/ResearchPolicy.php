<?php
declare(strict_types=1);

namespace App\Policy;

use App\Model\Entity\Research;
use Authorization\IdentityInterface;

/**
 * Research policy
 */
class ResearchPolicy
{
    /**
     * Check if $user can add Research
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\Research $research
     * @return bool
     */
    public function canAdd(IdentityInterface $user, Research $research)
    {
      return true;
    }

    /**
     * Check if $user can edit Research
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\Research $research
     * @return bool
     */
    public function canEdit(IdentityInterface $user, Research $research)
    {
      return $this->isAuthor($user,$research);
    }



    /**
     * Check if $user can view Research
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\Research $research
     * @return bool
     */
    public function canView(IdentityInterface $user, Research $research)
    {
       if($user->role==='admin' || $research->user_id === $user->getIdentifier()){
         return true;
       }
      //return $this->isAuthor($user,$research);
    }

    protected function isAuthor(IdentityInterface $user, Research $research)
    {
        return $research->user_id === $user->getIdentifier();
    }


}
