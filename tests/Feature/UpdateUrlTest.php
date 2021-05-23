<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UpdateUrlTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        #run test  -->  vendor/bin/phpunit --filter 'UpdateUrlTest'
        $id=7;
        $data=["url" => "https://www.google.com/"];
        $response = $this->json('PUT', 'api/'. $id, $data);
        $response->assertStatus(200);
    }

}
