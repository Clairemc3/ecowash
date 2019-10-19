<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class MachinesTest extends TestCase
{

    use WithFaker, RefreshDatabase;


    /**  @test  */
    public function a_user_can_create_a_machine()
    {

        $this->withoutExceptionHandling();

        $attributes = [
            'name' => $this->faker->sentence(3),
            'price' => $this->faker->sentence(4), 
            'description' => $this->faker->sentence(5),
        ];

        $this->post('/machines', $attributes)->assertRedirect('/machines');

        $this->assertDatabaseHas('machines', $attributes);

        $this->get('/machines')->assertSee($attributes['name']);
    }

    /**  @test  */
    public function a_user_can_update_a_machine()
    {
        $this->withoutExceptionHandling();

        $machine = factory('App\Machine')->create();

        $updatedMachine = factory('App\Machine')->raw();


        $this->put($machine->path() , $updatedMachine )->assertRedirect('/machines');

        $this->assertDatabaseHas('machines', array_merge(['id' => $machine->id], $updatedMachine ));
    }


    /**  @test  */
    public function a_machine_requires_a_name()
    {

        $attributes = factory('App\Machine')->raw(['name' => '']);
        
        $this->post('/machines', $attributes)->assertSessionHasErrors('name');
    }

    /**  @test  */
    public function a_machine_requires_a_price()
    {
        $attributes = factory('App\Machine')->raw(['price' => '']);

        $this->post('/machines', $attributes)->assertSessionHasErrors('price');
    }

}
