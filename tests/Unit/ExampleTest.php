<?php

namespace Tests\Unit;


use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $this->assertTrue(true);
    }
    // public function testBasicRoot()
    // {
    //     $response = $this->get('/');

    //     $response->assertStatus(200);
    // }

    // public function testBasicExample()
    // {
    //     $response = $this->withHeaders([
    //         'X-Header' => 'Value',
    //     ])->json('POST', '/user', ['name' => 'Sally']);

    //     $response
    //         ->assertStatus(201)
    //         ->assertJson([
    //             'created' => true,
    //         ]);
    // }
}
