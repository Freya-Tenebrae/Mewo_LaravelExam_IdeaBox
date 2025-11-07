<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Idea;

class IdeaPolicy
{
    public function view(User $user, Idea $idea): bool
    {
        return $user->id === $idea->user_id;
    }

    public function update(User $user, Idea $idea): bool
    {
        if ($idea->status != 'Submitted') {
            return false;
        }

        return $user->id === $idea->user_id;
    }

    public function delete(User $user, Idea $idea): bool
    {
        if ($idea->status != 'Submitted') {
            return false;
        }
        
        return $user->id === $idea->user_id;
    }
}
