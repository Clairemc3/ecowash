<?php

use Illuminate\Database\Seeder;
use Silber\Bouncer\BouncerFacade as Bouncer;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
	   $superAdmin = Bouncer::role()->firstOrCreate([
		    'name' => 'super-admin',
		    'title' => 'Super Administrator',
	    ]);

	    Bouncer::role()->firstOrCreate([
		    'name' => 'admin',
		    'title' => 'Administrator',
	    ]);


	    // Add initial permissions
	    Bouncer::allow('super-admin')->everything();
	    Bouncer::allow('super-admin')->to('create', \App\Promotion::class);
	    Bouncer::allow('super-admin')->to('create', \App\Slider::class);


	    Bouncer::allow('admin')->toManage(\App\User::class);
	    Bouncer::allow('admin')->toManage(\App\Alert::class);
	    Bouncer::allow('admin')->toManage(App\Slider::class);
	    Bouncer::allow('admin')->toManage(App\Machine::class);
	    Bouncer::allow('admin')->to('update', App\Content::class);


    }
}
