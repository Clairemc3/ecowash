<?php

namespace Tests\Feature;

use App\Events\UserInvited;
use App\Notifications\UserInvitation;
use App\Repositories\ActivationRepository;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Event;

class InviteUserTest extends TestCase {

	use WithFaker, RefreshDatabase;

	/** @test
	 * A basic feature test example.
	 *
	 * @return void
	 */
	public function a_user_can_invite_a_new_user()
	{
		Event::fake(UserInvited::class);

		$this->withoutExceptionHandling();

		$this->actingAs($this->authenticatedUser);

		$this->get('admin/users/invite')->assertStatus(200);

		$attributes = factory(\App\User::class)->raw();

		$this->post('admin/users/invite', $attributes)->assertRedirect('/admin/users');

		$this->assertDatabaseHas('users', $attributes);

		// Assert that the UserInvited event was dispatched
		Event::assertDispatched(UserInvited::class);

	}

	/**
	 * A basic feature test example.
	 *
	 * @return void
	 */
	public function an_invited_user_receives_an_activation_email_with_an_activation_link()
	{
		Notification::fake();

		$user = factory(\App\User::class)->state('invited')->create();

		event(new UserInvited($user));

		// Assert an activation exists for this user
		$this->assertDatabaseHas('activations', ['user_id' => $user->id, 'completed_at' => 0]);

		// Assert a notification was sent to the given users with an activation link
		Notification::assertSentTo(
			[$user], UserInvitation::class
		);

	}

	/** @test
	 * A basic feature test example.
	 *
	 * @return void
	 */
	public function an_invited_user_can_activate_their_account()
	{
		$this->withoutExceptionHandling();

		$user = factory(\App\User::class)->state('invited')->create();

		$activationRepository = new ActivationRepository();

		$token = $activationRepository->create($user);

		$route = "/activate/{$token}?email={$user->email}";

		$this->get($route)->assertStatus(200);

//		$this->post($route, ['password' => 'password',
//		                     'password_confirmation' => 'password']);


	}
}

   // An existing user can invite a new user// new user should be created with invited status
	   // The new user should receive a new user email
	   //   A
	   //
// An invited user can activate their account
	// - token link should work
	//  - user can set their password
	// user should be come active
	// user should be able to login with the password they set

// An invited user cant login
// a user with an expired token cant activate their account
// a user with a completed invitation cant activate their account