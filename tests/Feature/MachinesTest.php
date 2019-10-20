<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class MachinesTest extends TestCase
{

    use WithFaker, RefreshDatabase;



    /**  @test  */
    public function unauthenticated_users_cannnot_create_a_machine()
    {
        $attributes = factory('App\Machine')->raw();

        $this->post('/machines', $attributes)->assertRedirect('/login');
    }


    /**  @test  */
    public function users_can_view_machines()
    {
        $this->actingAs($this->authenticatedUser);

        factory('App\Machine', 5)->create();

        $this->get('/machines')->assertSee('Machines')->assertStatus(200);
    }

    /**  @test  */
    public function a_user_can_create_a_machine()
    {
        $this->withoutExceptionHandling();

        $this->actingAs($this->authenticatedUser);

        $attributes = factory('App\Machine')->raw();

        $this->post('/machines', $attributes)->assertRedirect('/machines');

        $this->assertDatabaseHas('machines', $attributes);

        $this->get('/machines')->assertSee($attributes['name']);
    }

    /**  @test  */
    public function a_user_can_update_a_machine()
    {
        $this->withoutExceptionHandling();

        $this->actingAs($this->authenticatedUser);

        $machine = factory('App\Machine')->create();

        $updatedMachine = factory('App\Machine')->raw();

        $this->put($machine->path() , $updatedMachine )->assertRedirect('/machines');

        $this->assertDatabaseHas('machines', array_merge(['id' => $machine->id], $updatedMachine ));
    }


    /**  @test  */
    public function a_machine_requires_a_name()
    {
        $this->actingAs($this->authenticatedUser);

        $attributes = factory('App\Machine')->raw(['name' => '']);
        
        $this->post('/machines', $attributes)->assertSessionHasErrors('name');
    }

    /**  @test  */
    public function a_machine_requires_a_price()
    {
        $this->actingAs($this->authenticatedUser);

        $attributes = factory('App\Machine')->raw(['price' => '']);

        $this->post('/machines', $attributes)->assertSessionHasErrors('price');
    }

}
