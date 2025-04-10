<?php
declare(strict_types=1);

namespace App\Policy;

use App\Model\Entity\ResearchVerification;
use Authorization\IdentityInterface;

/**
 * ResearchVerification policy
 */
class ResearchVerificationPolicy
{
    /**
     * Check if $user can add ResearchVerification
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\ResearchVerification $researchVerification
     * @return bool
     */
    public function canVerify(IdentityInterface $user, ResearchVerification $researchVerification)
    {
        if($user->role ==='admin'){
          return true;
        }
    }

    /**
     * Check if $user can edit ResearchVerification
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\ResearchVerification $researchVerification
     * @return bool
     */
    public function canEdit(IdentityInterface $user, ResearchVerification $researchVerification)
    {
      if($user->role ==='admin'){
        return true;
      }
    }

    /**
     * Check if $user can delete ResearchVerification
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\ResearchVerification $researchVerification
     * @return bool
     */
    public function canDelete(IdentityInterface $user, ResearchVerification $researchVerification)
    {
      if($user->role ==='admin'){
        return true;
      }
    }

    /**
     * Check if $user can view ResearchVerification
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\ResearchVerification $researchVerification
     * @return bool
     */
    public function canView(IdentityInterface $user, ResearchVerification $researchVerification)
    {
        if($user->role ==='admin'){
          return true;
        }
    }
}
