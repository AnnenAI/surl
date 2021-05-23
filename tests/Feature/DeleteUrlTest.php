<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DeleteUrlTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_successful()
    {
        #run test  -->  vendor/bin/phpunit --filter 'DeleteUrlTest'
        $id=7;
        $response = $this->json('DELETE', 'api/'. $id);
        $response->assertStatus(204);
    }
}
