<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ManageSlidersTest extends TestCase
{
    use WithFaker, RefreshDatabase;

    /**  @test  */
    public function guests_cannnot_manage_sliders()
    {
        $alert = factory('App\Alert')->create();

        $this->get('admin/alerts')->assertRedirect('/login');
        $this->get('admin/content/create')->assertRedirect('/login');
        $this->post('admin/content', $alert->toArray())->assertRedirect('/login');
    }

    /**  @test  */
    public function a_user_can_view_sliders()
    {
        $this->withoutExceptionHandling();

        $this->actingAs($this->authenticatedUser);

        $alertRecords = factory('App\Slider', 3)->create();

        $this->get('admin/sliders')->assertSee('Sliders')->assertStatus(200);
    }

    /**  @test  */
    public function a_user_can_create_a_slider()
    {
        $this->withoutExceptionHandling();

        $this->actingAs($this->authenticatedUser);

        $this->get('admin/sliders/create')->assertStatus(200);

        $attributes = factory('App\Slider')->raw();

        $this->post('admin/sliders', $attributes)->assertRedirect('/admin/sliders');

        $this->assertDatabaseHas('sliders', $attributes);

        $this->get('admin/sliders')->assertSee($attributes['text']);
    }

    /**  @test  */
    public function a_user_can_update_an_slider()
    {
        $this->withoutExceptionHandling();

        $this->actingAs($this->authenticatedUser);

        $slider = factory('App\Slider')->create();

        $updatedSlider = factory('App\Slider')->raw();

        // Check the edit route is working
        $this->get($slider->path())->assertStatus(200)->assertSee($slider->text);

        $this->put($slider->path(), $updatedSlider)->assertRedirect('/admin/sliders');

        $this->assertDatabaseHas('sliders', array_merge(['id' => $slider->id], $updatedSlider));
    }

    /**  @test  */
    public function a_user_can_delete_a_slider()
    {
        $this->withoutExceptionHandling();

        $this->actingAs($this->authenticatedUser);

        $alert = factory('App\Alert')->create();

        $this->delete($alert->path())->assertRedirect('/admin/alerts');

        $this->assertDatabaseMissing('alerts', $alert->toArray());
    }

    // There can be a max of three sliders at once
   // A slider must have an image
   // The text must be a max length
}
