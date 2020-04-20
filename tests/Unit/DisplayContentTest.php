<?php

namespace Tests\Unit;

// use PHPUnit\Framework\TestCase;
use DisplayContent;
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
        $contentRecord = factory('App\Content')->create();

        $this->assertEquals($contentRecord->body, DisplayContent::bySlug($contentRecord->slug));
    }

    /**
     * @test
     */
    public function it_returns_conftent_body()
    {
        $this->assertTrue(true);
    }
}
