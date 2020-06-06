<?php

	namespace App;

class UserStatus {

	const ACTIVE = 'Active';
	const INACTIVE = 'Inactive';
	const INVITED = 'Invited';


	/**
	 * Returns an array of statuses
	 *
	 * @return array
	 */
	public static function all()
	{
		return [static::ACTIVE, static::INACTIVE, static::INVITED];
	}
}
