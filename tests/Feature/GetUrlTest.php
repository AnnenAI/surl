<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class GetUrlTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        #run test  -->  vendor/bin/phpunit --filter 'GetUrlTest'
        $id=7;
        $response = $this->json('GET', 'api/'. $id);
        $response->assertStatus(301);
    }

}
