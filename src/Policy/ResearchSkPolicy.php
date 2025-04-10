<?php
declare(strict_types=1);

namespace App\Policy;

use App\Model\Entity\ResearchSk;
use Authorization\IdentityInterface;

/**
 * ResearchSk policy
 */
class ResearchSkPolicy
{
    /**
     * Check if $user can add ResearchSk
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\ResearchSk $researchSk
     * @return bool
     */
    public function canAdd(IdentityInterface $user, ResearchSk $researchSk)
    {
      if($user->role ==='admin'){
        return true;
      }
    }

    /**
     * Check if $user can edit ResearchSk
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\ResearchSk $researchSk
     * @return bool
     */
    public function canEdit(IdentityInterface $user, ResearchSk $researchSk)
    {
      if($user->role ==='admin' || $user->role ==='staff'){
        return true;
      }
    }

    /**
     * Check if $user can delete ResearchSk
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\ResearchSk $researchSk
     * @return bool
     */
    public function canDelete(IdentityInterface $user, ResearchSk $researchSk)
    {
      if($user->role ==='admin'){
        return true;
      }
    }

    /**
     * Check if $user can view ResearchSk
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\ResearchSk $researchSk
     * @return bool
     */
    public function canView(IdentityInterface $user, ResearchSk $researchSk)
    {
      if($user->role ==='admin'){
        return true;
      }
    }

    public function canTtd(IdentityInterface $user, ResearchSk $researchSk)
    {
      if($user->role ==='admin'){
        return true;
      }
    }
    
    public function canIndex(IdentityInterface $user, ResearchSk $researchSk)
    {
      if($user->role ==='admin'){
        return true;
      }
    }
}
