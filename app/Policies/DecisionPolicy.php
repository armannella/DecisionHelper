<?php

namespace App\Policies;

use App\DecisionType;
use App\Models\Decision;
use App\Models\User;
use Illuminate\Auth\Access\Response;
use Illuminate\Support\Facades\Auth;

class DecisionPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return false;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Decision $decision): bool
    {
        if($user->id == $decision->user_id){
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return false;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Decision $decision): bool
    {
        return false;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Decision $decision): bool
    {
        return false;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Decision $decision): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Decision $decision): bool
    {
        return false;
    }

    public function isUserDecision(User $user, Decision $decision): bool
    {
        if($user->id == $decision->user_id){
            return true;
        }
        return false;
    }

    public function isDecisionBinary(User $user,Decision $decision): bool
    {
        if($decision->type === DecisionType::BINARY){
            return true;
        }
        return false;
    }

        public function isDecisionMulti(User $user,Decision $decision): bool
    {
        if($decision->type === DecisionType::MULTI){
            return true;
        }
        return false;
    }
}
