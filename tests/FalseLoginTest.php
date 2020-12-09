<?php

namespace Tests\Feature;

use Tests\TestCase;

class FalseLoginTest extends TestCase
{

    public function testLoginFalse()
    {
        $credential = [
            'email' => 'user@ad.com',
            'password' => 'incorrectpass'
        ];

        $response = $this->post('login',$credential);

        $response->assertSessionHasErrors();
    }

}
