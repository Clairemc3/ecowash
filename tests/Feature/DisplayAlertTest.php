<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DisplayAlertTest extends TestCase
{
    use WithFaker, RefreshDatabase;

    /**
     * @test
     *
     * @return void
     */
    public function show_active_alert()
    {
        $activeAlert = factory(\App\Alert::class)
            ->create(['start_date' => now()]);
        $response = $this->get('/');

        $response->assertStatus(200)->assertSeeText($activeAlert->short_text);
    }

    /**
     * @test
     *
     * @return void
     */
    public function inactive_alerts_should_not_show()
    {
        $inactiveAlert = factory(\App\Alert::class)
            ->create(['start_date' => now()->addDays(10)]);
        $response = $this->get('/');

        $response->assertStatus(200)->assertDontSeeText($inactiveAlert->short_text);
    }
}
