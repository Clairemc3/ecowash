<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ManageContentTest extends TestCase
{

    use WithFaker, RefreshDatabase;


    /**  @test  */
    public function guests_cannnot_manage_content()
    {
        $content = factory('App\Content')->create();

        $this->get('admin/content')->assertRedirect('/login');
        // $this->get('admin/content/create')->assertRedirect('/login');
        // $this->post('admin/content', $content->toArray())->assertRedirect('/login');
    }
  
     /**  @test  */
    public function a_user_can_view_content_records()
    {
        $this->actingAs($this->authenticatedUser);

       $contentRecords = factory('App\Content', 5)->create();

        $this->get('admin/content')->assertSee('Content')->assertStatus(200);

    }

}
