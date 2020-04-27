<?php

namespace Tests\Feature;

use App\Slider;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ManageSlidersTest extends TestCase
{
    use WithFaker, RefreshDatabase;

    /**  @test  */
    public function guests_cannnot_manage_sliders()
    {
        $slider = factory(\App\Slider::class)->create();

        $this->get('admin/sliders')->assertRedirect('/login');
        $this->get('admin/sliders/create')->assertRedirect('/login');
        $this->post('admin/sliders', $slider->toArray())->assertRedirect('/login');
    }

    /**  @test  */
    public function a_user_can_view_sliders()
    {
        $this->withoutExceptionHandling();

        $this->actingAs($this->authenticatedUser);

        $alertRecords = factory(\App\Slider::class, 3)->create();

        $this->get('admin/sliders')->assertSee('Sliders')->assertStatus(200);
    }

    /**  @test  */
    public function a_user_can_create_a_slider()
    {
        $this->withoutExceptionHandling();

        $this->actingAs($this->authenticatedUser);

        $this->get('admin/sliders/create')->assertStatus(200);

        $attributes = factory(\App\Slider::class)->raw();

        $this->post('admin/sliders', $attributes)->assertRedirect('/admin/sliders');

        $this->assertDatabaseHas('sliders', $attributes);

        $this->get('admin/sliders')->assertSee($attributes['text']);
    }

    /**  @test  */
    public function a_user_can_update_an_slider()
    {
        $this->withoutExceptionHandling();

        $this->actingAs($this->authenticatedUser);

        $slider = factory(\App\Slider::class)->create();

        $updatedSlider = factory(\App\Slider::class)->raw();

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

        $slider = factory(\App\Slider::class)->create();

        $this->delete($slider->path())->assertRedirect('/admin/sliders');

        $this->assertDatabaseMissing('sliders', $slider->toArray());
    }

    /**  @test  */
    public function users_can_only_create_three_sliders()
    {
        $this->withoutExceptionHandling();

        $this->actingAs($this->authenticatedUser);

        factory(\App\Slider::class, 3)->create();

        $this->get('/admin/sliders/create')->assertStatus(302)
            ->assertSessionHas('error');

    }



   // A slider must have an image
   // The text must be a max length (must not go over two lines in mobile view)
}
