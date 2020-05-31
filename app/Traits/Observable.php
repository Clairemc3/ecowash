<?php

	namespace App\Traits;

	trait Observable
	{
		public static function bootObservable()
		{
			if (isset(self::$observer)) {
				static::observe(self::$observer);
			}
		}
	}
