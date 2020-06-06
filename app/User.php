<?php

namespace App;

use App\Observers\UserObserver;
use App\Traits\Observable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Silber\Bouncer\Database\HasRolesAndAbilities;


class User extends Authenticatable
{
    use Notifiable, HasRolesAndAbilities, Observable;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

	/**
	 * Registers the User Observer
	 */
	protected static $observer = UserObserver::class;

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


	/**
	 * Defines the path for this model.
	 *
	 * @return string
	 */
	public function path()
	{
		return "/admin/users/{$this->id}";
	}
}
