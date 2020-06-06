<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use	\Silber\Bouncer\BouncerFacade as Bouncer;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $user = User::updateOrCreate(
            ['email' => 'clairemc3@gmail.com'],
            ['name' => 'claire',
            'password' => Hash::make('password'), ]);


	   Bouncer::assign('super-admin')->to($user);
	    Bouncer::assign('admin')->to($user);
    }
}
