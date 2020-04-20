<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ContentTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_has_a_path()
    {
        $contentRecord = factory(\App\Content::class)->create();

        $this->assertEquals('/admin/content/'.$contentRecord->id, $contentRecord->path());
    }
}
