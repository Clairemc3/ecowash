<?php

	namespace App;

class UserStatus {

	const ACTIVE = 'active';
	const INACTIVE = 'inactive';
	const INVITED = 'invited';


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
