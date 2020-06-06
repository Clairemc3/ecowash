<?php

namespace App\Policies;

use App\Promotion;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PromotionPolicy
{
    use HandlesAuthorization;


	public function before($user, $ability)
	{
		if ($user->isA('super-admin')) {
			return true;
		}
	}

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\User  $user
     * @param  \App\Promotion  $promotion
     * @return mixed
     */
    public function view(User $user, Promotion $promotion)
    {
        return true;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\Promotion  $promotion
     * @return mixed
     */
    public function update(User $user, Promotion $promotion)
    {
    	return true;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Promotion  $promotion
     * @return mixed
     */
    public function delete(User $user, Promotion $promotion)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\User  $user
     * @param  \App\Promotion  $promotion
     * @return mixed
     */
    public function restore(User $user, Promotion $promotion)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Promotion  $promotion
     * @return mixed
     */
    public function forceDelete(User $user, Promotion $promotion)
    {
        //
    }
}
