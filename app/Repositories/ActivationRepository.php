<?php

namespace App\Repositories;

use App\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ActivationRepository
{
	public $table = 'activations';

	public $expires = 24; // Hours

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
	 * @param User $user
	 */
	public function valid(string $email, string $token): bool
	{
		$user = User::where('email', $email)->first();

		// If no user with this email, return false;
		if (!$user)
		{
			return false;
		}

		// Get the active record
		$activation = DB::table($this->table)
			->where('user_id', $user->id)
			->where('completed', 0)->get();

		// If activation exists, token is valid and is not expired return true
		if ($activation &&
			!$this->expired($activation->created_at) &&
			Hash::check($token, $activation->token))
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
	protected function getPayload(User $user, $token)
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