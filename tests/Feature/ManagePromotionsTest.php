<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ManagePromotionsTest extends TestCase
{
    use WithFaker, RefreshDatabase;

    /**  @test  */
    public function a_user_can_view_promotions()
    {
        $this->withoutExceptionHandling();

        $this->actingAs($this->authenticatedUser);

        factory(\App\Promotion::class, 1)->create();

        $this->get('/admin/promotions')
            ->assertSee('Promotions')
            ->assertStatus(200);
    }




    //Super admin can add  delete a promotion


}
