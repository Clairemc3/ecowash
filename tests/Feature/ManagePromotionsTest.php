<?php

	namespace Tests\Feature;

	use Illuminate\Foundation\Testing\RefreshDatabase;
	use Illuminate\Foundation\Testing\WithFaker;
	use Tests\TestCase;

	class ManagePromotionsTest extends TestCase {

		use WithFaker, RefreshDatabase;

		/**  @test */
		public function a_user_can_view_promotions()
		{
			$this->withoutExceptionHandling();

			$this->actingAs($this->authenticatedUser);

			factory(\App\Promotion::class, 1)->create();

			$this->get('/admin/promotions')
				->assertSee('Promotions')
				->assertStatus(200);
		}


		/**  @test */
		public function a_user_can_create_a_promotion()
		{
			$this->withoutExceptionHandling();

			$this->actingAs($this->authenticatedUser);

			$this->get('admin/promotions/create')->assertStatus(200);

			$attributes = factory(\App\Promotion::class)->raw();

			$this->post('admin/promotions', $attributes)->assertRedirect('/admin/promotions');

			$this->assertDatabaseHas('promotions', $attributes);

			$this->get('admin/promotions')->assertSee($attributes['name']);
		}


		/**  @test */
		public function a_user_can_update_a_promotion()
		{
			$this->withoutExceptionHandling();

			$this->actingAs($this->authenticatedUser);

			$promotion = factory(\App\Promotion::class)->create();

			$updatedPromotion = factory(\App\Promotion::class)->raw();

			// Check the edit route is working
			$this->get($promotion->path())->assertStatus(200);

			$this->put($promotion->path(), $updatedPromotion)->assertRedirect('/admin/promotions');

			$this->assertDatabaseHas('promotions', array_merge(['id' => $promotion->id], $updatedPromotion));
		}


		/**  @test  */
		public function a_user_can_delete_a_promotion()
		{
			$this->withoutExceptionHandling();

			$this->actingAs($this->authenticatedUser);

			$promotion = factory(\App\Promotion::class)->create();

			$this->delete($promotion->path())->assertRedirect('/admin/promotions');

			$this->assertDatabaseMissing('promotions', $promotion->toArray());
		}


		//Super admin can add  delete a promotion
		// Admin can only edit existing, amd edit existing status (active or not active)

	}
