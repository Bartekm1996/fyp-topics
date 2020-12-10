<?php

namespace Tests\Feature;


use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class RegisterNewUserTest extends TestCase
{

    public function testSuccess()
    {

        $response = $this->post('/register', [
            'name' => 'newName',
            'email' => '1111@studentmail.ul.ie',
            'password' => '12345678',
            'confirm password' => '12345678'
            // there is missing I agree with the Privacy Policy checkbox
        ]);


        $this->assertEquals(302, $response->getStatusCode());
    }
}
