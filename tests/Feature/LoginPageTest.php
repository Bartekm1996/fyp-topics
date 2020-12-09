<?php

namespace Tests\Feature;

use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class LoginPageTest extends TestCase
{

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testSuccess()
    {

        $response = $this->post('/login', [
            'email' => 'name@studentmail.ul.ie',
            'password' => 'pass'
        ]);

        $response->assertStatus(302);
    }
}
