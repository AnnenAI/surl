<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AddUrlTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        #run test  -->  vendor/bin/phpunit --filter 'AddUrlTest'
        $data=["url" => "https://www.google.ru/"];
        $response = $this->json('POST', 'api/', $data);
        $response->assertStatus(201);
    }
}
