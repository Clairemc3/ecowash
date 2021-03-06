<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AlertTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_has_a_path()
    {
        $alert = factory(\App\Alert::class)->create();

        $this->assertEquals('/admin/alerts/'.$alert->id, $alert->path());
    }

    /** @test */
    public function it_is_active_based_on_start_and_end_date()
    {
        $alert = factory(\App\Alert::class)->create(
            ['starts_at' => now()->subSecond(1)->toDateTimeString(),
            'ends_at' => now()->addHours(1)->toDateTimeString(), ]);

        $this->assertEquals(true, $alert->isActive());
    }
}
