<?php

namespace Tests\Unit;

use ContentBlock;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DisplayContentTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function it_returns_content_body()
    {
        $contentRecord = factory(\App\Content::class)->create();

        $this->assertEquals($contentRecord->body, ContentBlock::getContent($contentRecord->slug));
    }

}
