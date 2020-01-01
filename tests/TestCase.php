<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;


    protected function setUp(): void
    {
        parent::setUp();

        // Create a user
        $this->authenticatedUser = factory('App\User')->create();

    }
}
