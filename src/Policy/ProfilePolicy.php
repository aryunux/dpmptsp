<?php
declare(strict_types=1);

namespace App\Policy;

use App\Model\Entity\Profile;
use Authorization\IdentityInterface;

/**
 * Profile policy
 */
class ProfilePolicy
{
    /**
     * Check if $user can add Profile
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\Profile $profile
     * @return bool
     */
    public function canAdd(IdentityInterface $user, Profile $profile)
    {
      return true;
    }

    /**
     * Check if $user can edit Profile
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\Profile $profile
     * @return bool
     */
    public function canEdit(IdentityInterface $user, Profile $profile)
    {
      return $this->isAuthor($user,$profile);
    }

    /**
     * Check if $user can delete Profile
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\Profile $profile
     * @return bool
     */
    public function canDelete(IdentityInterface $user, Profile $profile)
    {
    }

    /**
     * Check if $user can view Profile
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\Profile $profile
     * @return bool
     */
    public function canView(IdentityInterface $user, Profile $profile)
    {
      if($user->role==='admin' || $profile->user_id === $user->getIdentifier())
      {
        return true;
      }
    }

    protected function isAuthor(IdentityInterface $user, Profile $profile)
    {
        return $profile->user_id === $user->getIdentifier();
    }
}
