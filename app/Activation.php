<?php

namespace App;

use App\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class Activation
{
	public $table = 'activations';

	public $expires = 24; // Hours

	private $activation;

	public function create(User  $user): string
	{
		// Delete existing activations
		$this->deleteExisting($user);

		// Create token
		$token = Str::random(40);

		// Add record to database
		DB::table($this->table)->insert($this->getPayload($user, $token));

		return $token;
	}

	public function user()
	{
		return User::find($this->activation->user_id);
	}

	/**
	 * @param string $email
	 * @param string $token
	 */
	public function findByEmail(string $email)
	{
		$user = User::where('email', $email)->first();

		// Get the active record
		$this->activation = DB::table($this->table)
			->where('user_id', $user->id)
			->whereNull('completed_at')->first();

		return $this;

	}

	/**
	 * @return mixed
	 */
	public function get()
	{
		return $this->activation;
	}

	/**
	 * @param User $user
	 */
	public function deleteExisting(User $user)
	{
		DB::table($this->table)
			->where('user_id', $user->id)
			->delete();
	}


	/**
	 * @param string $token
	 * @return bool
	 */
	public function isValid(string $token): bool
	{
		// If activation exists, token is valid and is not expired return true
		if ($this->activation &&
			!$this->expired($this->activation->created_at) &&
			Hash::check($token, $this->activation->token))
		{
			return true;
		}
		return false;
	}

	/**
	 * Build the record payload for the table.
	 *
	 * @param  User  $user
	 * @param  string  $token
	 * @return array
	 */
	protected  function getPayload(User $user, $token)
	{
		return [
			'user_id' => $user->id,
			'token' => Hash::make($token),
			'created_at' => new Carbon() ];
	}


	/**
	 * Check if the activation is expired
	 * @param string $createdAt
	 * @return bool
	 */
	private function expired(string $createdAt)
	{
		return Carbon::parse($createdAt)
			->addHours($this->expires)->isPast();
	}

}