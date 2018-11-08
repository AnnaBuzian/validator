<?php

namespace App\Policies;

use App\Entity\Queue;
use App\Entity\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class QueuePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user is admin for all authorization.
     */
    public function before(User $user)
    {
        if ($user->isAdmin()) {
            return true;
        }
    }

    /**
     * Determine whether the user can update the queue.
     */
    public function update(User $user, Queue $queue): bool
    {
        return $user->isAdmin();
    }

    /**
     * Determine whether the user can store a post.
     */
    public function store(User $user): bool
    {
        return $user->isAdmin();
    }

    /**
     * Determine whether the user can delete the queue.
     */
    public function delete(User $user, Queue $queue): bool
    {
        return $user->isAdmin();
    }
}
