<?php

namespace Tests\Feature;

use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ManageUsersTest extends TestCase
{
	use WithFaker, RefreshDatabase;

	/**  @test  */
	public function guests_cannnot_manage_users()
	{
		$this->get('admin/users')->assertRedirect('/login');
		$this->get('admin/users/invite')->assertRedirect('/login');
	}


	/**  @test  */
	public function a_user_can_view_users()
	{
		$this->withoutExceptionHandling();

		$this->actingAs($this->authenticatedUser);

		factory(\App\User::class, 3)->create();

		$this->get('admin/users')->assertSee('Users')->assertStatus(200);
	}


	/**  @test  */
	public function a_user_can_invite_a_user()
	{
		$this->withoutExceptionHandling();

		$this->actingAs($this->authenticatedUser);

		$this->get('admin/users/create')->assertStatus(200);

		$attributes = factory(\App\User::class)->raw();

		$this->post('admin/users/invite', $attributes)->assertRedirect('/admin/users');

		$this->assertDatabaseHas('users', $attributes);

		$this->get('admin/users')->assertSee($attributes['email']);

	}


	/**  @test  */
	public function a_user_can_delete_a_user()
	{
		$this->actingAs($this->authenticatedUser);

		$user = factory(\App\User::class)->create();

		$this->delete($user->path());

		$this->assertDatabaseMissing('users', $user->toArray());
	}


	/**  @test  */
	public function a_user_cannot_delete_themself()
	{
		$this->withoutExceptionHandling();

		$this->expectException(AuthorizationException::class);

		$this->actingAs($this->authenticatedUser);

		$this->delete($this->authenticatedUser->path());

	}
}
