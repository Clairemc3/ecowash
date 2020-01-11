<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ManageAlertsTest extends TestCase
{

    use WithFaker, RefreshDatabase;

    /**  @test  */
    public function guests_cannnot_manage_alerts()
    {
        $alert = factory('App\Alert')->create();

        $this->get('admin/alerts')->assertRedirect('/login');
        // $this->get('admin/content/create')->assertRedirect('/login');
        // $this->post('admin/content', $content->toArray())->assertRedirect('/login');
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


    // admin can add, edit and delete alerts
    // alerts should have a start and end date
    // alerts should have short and long text
    // short text can be a max of 40 characters
    // end date must be after the start date
    // alerts should be displayed on the front end when they are active
    // guests cannot see inactive alerts
    // you can only have one active alert at a time
    // guest users should see a pop up with the long alert message just once
    // admins should have the option to reset alert alerts will be reshown to everyone

}
