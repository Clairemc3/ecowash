<?php

namespace Tests\Browser;

use App\Alert;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class AlertModalTest extends DuskTestCase
{
    use WithFaker, DatabaseMigrations;

    /** @test
     * A Dusk test example.
     *
     * @return void
     */
    public function active_alerts_should_be_displayed()
    {
        $activeAlert = factory(\App\Alert::class)
        ->create(['start_date' => now()->subDays(2)]);

        $this->browse(function (Browser $browser) use ($activeAlert) {
            $browser->visit('/')
            ->waitForText($activeAlert->short_text)
            ->assertSee($activeAlert->short_text);
        });
    }

    // The modal should not open if the user has already seen it ( cookie)pmo
}
