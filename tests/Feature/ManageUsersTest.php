<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ManageUsersTest extends TestCase
{
	use WithFaker, RefreshDatabase;

	/**  @test  */
	public function guests_cannnot_manage_users()
	{
		$machine = factory(\App\User::class)->create();

		$this->get('admin/users')->assertRedirect('/login');
		$this->get('admin/users/create')->assertRedirect('/login');
		$this->post('admin/users', $machine->toArray())->assertRedirect('/login');
	}


	/**  @test  */
	public function a_user_can_view_users()
	{
		$this->withoutExceptionHandling();

		$this->actingAs($this->authenticatedUser);

		$users = factory(\App\User::class, 3)->create();

		$this->get('admin/users')->assertSee('Users')->assertStatus(200);
	}


	/**  @test  */
	public function a_user_can_invite_a_userr()
	{
		$this->withoutExceptionHandling();

		$this->actingAs($this->authenticatedUser);

		$this->get('admin/users/create')->assertStatus(200);

		$attributes = factory(\App\User::class)->raw();

		$this->post('admin/users', $attributes)->assertRedirect('/admin/users');

		$this->assertDatabaseHas('users', $attributes);

		$this->get('admin/users')->assertSee($attributes['email']);


		// An invitation email should ne sent
	}
}
