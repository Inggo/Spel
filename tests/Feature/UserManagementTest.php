<?php

namespace Tests\Feature;

use Inggo\Spel\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Tests\Traits\SetsUpRoles;

class UserManagementTest extends TestCase
{
    use RefreshDatabase, SetsUpRoles;

    public function test_user_management_screen_cannot_be_rendered_by_non_administrators()
    {
        $this->actAsNonAdmin();

        $response = $this->get('/users');

        $response->assertStatus(403);
    }

    public function test_user_management_screen_can_be_rendered_by_administrators()
    {
        $this->actAsAdmin();

        $response = $this->get('/users');

        $response->assertStatus(200);
    }
}
