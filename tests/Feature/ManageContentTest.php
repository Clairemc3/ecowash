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
        $content = factory(\App\Content::class)->create();

        $this->get('admin/content')->assertRedirect('/login');
        $this->get('admin/content/create')->assertRedirect('/login');
        $this->post('admin/content', $content->toArray())->assertRedirect('/login');
    }

    /**  @test  */
    public function a_user_can_view_content_records()
    {
        $this->withoutExceptionHandling();

        $this->actingAs($this->authenticatedUser);

        $contentRecords = factory(\App\Content::class, 5)->create();

        $this->get('admin/content')->assertSee('Content')->assertStatus(200);
    }

    /**  @test  */
    public function a_user_can_create_a_content_record()
    {
        $this->withoutExceptionHandling();

        $this->actingAs($this->authenticatedUser);

        $this->get('admin/content/create')->assertStatus(200);

        $attributes = factory(\App\Content::class)->raw();

        $this->post('admin/content', $attributes)->assertRedirect('/admin/content');

        $this->assertDatabaseHas('content', $attributes);

        $this->get('admin/content')->assertSee($attributes['help_text']);
    }

    /**  @test  */
    public function a_user_can_update_a_single_content_record()
    {
        $this->withoutExceptionHandling();

        $this->actingAs($this->authenticatedUser);

        $content = factory(\App\Content::class)->create();

        $updatedContent = factory(\App\Content::class)->raw();

        // Check the edit route is working
        $this->get($content->path())->assertStatus(200)->assertSee($content->help_text);

        $this->put($content->path(), $updatedContent)->assertRedirect('/admin/content');

        $this->assertDatabaseHas('content', array_merge(['id' => $content->id], $updatedContent));
    }

    /**  @test  */
    public function a_user_can_delete_a_content_record()
    {
        $this->withoutExceptionHandling();

        $this->actingAs($this->authenticatedUser);

        $content = factory(\App\Content::class)->create();

        $this->delete($content->path())->assertRedirect('/admin/content');

        $this->assertDatabaseMissing('content', $content->toArray());
    }
}
