<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Support\Str;

class ManageAlertsTest extends TestCase
{
    use WithFaker, RefreshDatabase;

    /**  @test  */
    public function guests_cannnot_manage_alerts()
    {
        $alert = factory('App\Alert')->create();

        $this->get('admin/alerts')->assertRedirect('/login');
        $this->get('admin/content/create')->assertRedirect('/login');
        $this->post('admin/content', $alert->toArray())->assertRedirect('/login');
    }


     /**  @test  */
     public function a_user_can_view_alert_records()
     {
         $this->withoutExceptionHandling();

         $this->actingAs($this->authenticatedUser);

         $alertRecords = factory('App\Alert', 5)->create();

         $this->get('admin/alerts')->assertSee('Alerts')->assertStatus(200);
     }

         /**  @test  */
    public function a_user_can_create_an_alert()
    {
        $this->withoutExceptionHandling();

        $this->actingAs($this->authenticatedUser);

        $this->get('admin/alerts/create')->assertStatus(200);

        $attributes = factory('App\Alert')->raw();

        $this->post('admin/alerts', $attributes)->assertRedirect('/admin/alerts');

        $this->assertDatabaseHas('alerts', $attributes);

        $this->get('admin/alerts')->assertSee($attributes['short_text']);
    }


    /**  @test  */
    public function a_user_can_update_an_alert()
    {
        $this->withoutExceptionHandling();

        $this->actingAs($this->authenticatedUser);

        $alert = factory('App\Alert')->create();

        $updatedAlert = factory('App\Alert')->raw();

        // Check the edit route is working
        $this->get($alert->path())->assertStatus(200)->assertSee($alert->short_text);

        $this->put($alert->path() , $updatedAlert )->assertRedirect('/admin/alerts');

        $this->assertDatabaseHas('alerts', array_merge(['id' => $alert->id], $updatedAlert ));
    }


    /**  @test  */
    public function a_user_can_delete_an_alert()
    {
        $this->withoutExceptionHandling();

        $this->actingAs($this->authenticatedUser);

        $alert = factory('App\Alert')->create();

        $this->delete($alert->path())->assertRedirect('/admin/alerts');

        $this->assertDatabaseMissing('alerts', $alert->toArray());
    }



    /**  @test  */
    public function an_alert_requires_start_and_end_dates()
    {
        $this->actingAs($this->authenticatedUser);

        $attributes = factory('App\Alert')->raw([
            'start_date' => null,
            'end_date' => null]);

        $this->post('admin/alerts', $attributes)
            ->assertSessionHasErrors([
                'start_date',
                'end_date']);
    }

    /**  @test  */
    public function an_alert_end_date_must_be_after_start_date()
    {
        $this->actingAs($this->authenticatedUser);

        $attributes = factory('App\Alert')->raw([
            'start_date' => now(),
            'end_date' => now()->subDays(1)]);

        $this->post('admin/alerts', $attributes)
            ->assertSessionHasErrors('end_date');
    }

    /**  @test  */
    public function an_alert_requires_short_and_long_text()
    {
        $this->actingAs($this->authenticatedUser);

        $attributes = factory('App\Alert')->raw([
            'short_text' => '',
            'long_text' => '']);

        $this->post('admin/alerts', $attributes)
            ->assertSessionHasErrors([
                'short_text',
                'long_text']);
    }

    /**  @test  */
    public function an_alert_short_text_has_max_chars()
    {
        $this->actingAs($this->authenticatedUser);

        // Max 60 chars
        $attributes = factory('App\Alert')->raw([
            'short_text' => Str::random(61),
            ]);

        $this->post('admin/alerts', $attributes)
            ->assertSessionHasErrors('short_text');
    }


    /**  @test  */
    public function there_should_only_be_one_active_alert()
    {
        $this->actingAs($this->authenticatedUser);

        $existingAlert = factory('App\Alert')->create();

        // Max 60 chars
        $newAlert = factory('App\Alert')->raw([
            'start_date' => $existingAlert->start_date,
            'end_date' => $existingAlert->end_date
            ]);

        $this->post('admin/alerts', $newAlert)
            ->assertSessionHasErrors('range');
    }

    // alerts should be displayed on the front end when they are active
    // guests cannot see inactive or expired alerts

    // guest users should see a pop up with the long alert message just once
    // admins should have the option to reset alert alerts will be reshown to everyone

}
