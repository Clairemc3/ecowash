<?php

namespace App\Observers;

use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserObserver
{
    /**
     * Handle the user "created" event.
     *
     * @param  \App\User  $user
     * @return void
     */
    public function creating(User $user)
    {
    	$user->password = Hash::make(Str::random(16));
    }

	/**
	 * Handle the user "created" event.
	 *
	 * @param  \App\User  $user
	 * @return void
	 */
	public function created(User $user)
	{
		$user->password = Hash::make(Str::random(16));
	}

}
