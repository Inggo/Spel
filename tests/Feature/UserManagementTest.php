<?php

namespace Tests\Feature;

use Inggo\Spel\Models\User;
use Inggo\Spel\Models\Role;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Tests\Traits\SetsUpRoles;

class UserManagementTest extends TestCase
{
    use RefreshDatabase, SetsUpRoles;

    public function test_user_management_screen_cannot_be_rendered_by_non_administrators()
    {
        $this->actingAs($user = User::factory()->create());

        $response = $this->get('/users');

        $response->assertStatus(403);
    }

    public function test_user_management_screen_can_be_rendered_by_administrators()
    {
        $this->actingAs($this->getAdminUser());

        $response = $this->get('/users');

        $response->assertStatus(200);
    }

    private function getAdminUser()
    {
        $user = User::factory()->create();

        $admin = Role::administrator();

        $user->roles()->save($admin);

        $user->fresh();

        return $user;
    }
}
