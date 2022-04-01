<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class UserTest2 extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $response = $this->get('/');

        $response->assertStatus(200);

    }

    public function testBasicExample()
    {
        $response = $this->withHeaders([
            'X-Header' => 'Value',
        ])->json('POST', '/user', ['name' => 'Sally']);

        $response
            ->assertStatus(201)
            ->assertJson([
                'created' => true,
            ]);
    }

    public function testCookies()
    {
        $response = $this->withCookie('color', 'blue')->get('/');

        $response = $this->withCookies([
            'color' => 'blue',
            'name' => 'Taylor',
        ])->get('/');
    }


    public function testBasicTest()
    {
        $response = $this->get('/');

        $response->dumpHeaders();

        $response->dumpSession();

        $response->dump();
    }

    public function testApplication()
    {
        // $response = $this->withSession(['foo' => 'bar'])
        //                  ->get('/');

        $user = factory(User::class)->create();

        $response = $this->actingAs($user)
                        ->withSession(['foo' => 'bar'])
                        ->get('/');

    }

    public function testBasicExample2()
    {
        $response = $this->postJson('/user', ['name' => 'Sally']);

        $response
            ->assertStatus(201)
            ->assertJson([
                'created' => true,
            ]);
    }

}
