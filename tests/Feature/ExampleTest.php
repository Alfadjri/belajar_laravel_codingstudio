<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     */
    public function test_the_application_returns_a_successful_response(): void
    {
        $response = $this->get('/');
        $response->assertStatus(404); // asumsi kalau localhost/ biasa itu tidak muncul
        // asumsikan 
        $response = $this->get('/admin');
        $response->assertStatus(302);
    }
}
