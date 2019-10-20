<?php

namespace Tests\Unit;

use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class MachineTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_has_a_path()
    {
        $machine = factory('App\Machine')->create();

        $this->assertEquals('/machines/'. $machine->id, $machine->path());

    }
}
