<?php

namespace Tests\Feature;


use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class AccessToTopicsIfLoginSuccessTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testSuccess()
    {

        $response = $this->post('/login', [
            'email' => '17244412@studentmail.ul.ie',
            'password' => '12345678'
        ]);

        $response->assertRedirect('/home');
        $this->assertTrue(Auth::check());

        $response2 = $this->get('/topics');
        $response2->assertStatus(200);
    }
}
