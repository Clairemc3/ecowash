<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SliderTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_has_a_path()
    {
        $sliderRecord = factory(\App\Slider::class)->create();

        $this->assertEquals('/admin/sliders/'.$sliderRecord->id, $sliderRecord->path());
    }
}
