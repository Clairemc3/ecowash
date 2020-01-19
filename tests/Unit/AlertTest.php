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
        $alert = factory('App\Alert')->create();

        $this->assertEquals('/admin/alerts/'. $alert->id, $alert->path());

    }

    /** @test */
    public function is_is_active_based_on_start_and_end_date()
    {
        $alert = factory('App\Alert')->create(
            ['start_date' => now()->toDateString(),
            'end_date' => now()->toDateString()]);

        $this->assertEquals(true, $alert->isActive());
    }
}
