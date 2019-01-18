<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ExampleTest extends TestCase
{
    /**
     * @test
     */
    public function BasicTest()
    {
        //Metod za preskakanje testa
        //$this->testThatWontBeExecuted();
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
