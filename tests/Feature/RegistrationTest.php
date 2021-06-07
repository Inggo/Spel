<?php

namespace Tests\Feature;

use Inggo\Spel\Providers\RouteServiceProvider;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Jetstream\Jetstream;
use Tests\TestCase;

class RegistrationTest extends TestCase
{
    use RefreshDatabase;

    public function test_registration_screen_cannot_be_rendered()
    {
        $response = $this->get('/register');

        $response->assertStatus(404);
    }

    public function test_new_users_cannot_register()
    {
        $response = $this->post('/register', [
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => 'password',
            'password_confirmation' => 'password',
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature(),
        ]);

        $this->assertGuest();

        $response->assertStatus(404);

        $this->assertDatabaseMissing('users', [
            'name' => 'Test User',
            'email' => 'test@example.com'
        ]);
    }
}
