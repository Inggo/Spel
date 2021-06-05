<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Console\Commands\Setup;
use App\Models\User;

class SetupCommandTest extends TestCase
{
    use RefreshDatabase;

    public function test_running_command_sets_up_admin_user_and_application_roles()
    {
        $this->artisan('spel:setup')
            ->expectsQuestion('Enter administrator name', 'Admin')
            ->expectsQuestion('Enter administrator email address', 'admin@spel.dev')
            ->expectsQuestion('Enter password', 'password123')
            ->expectsOutput('Creating user `Admin` <admin@spel.dev>...')
            ->expectsOutput('Setting up roles...')
            ->expectsOutput('Creating `Administrator` role...')
            ->expectsOutput('Assigning Administrator role to Admin...')
            ->expectsOutput('Setup complete!')
            ->assertExitCode(Setup::EXIT_SUCCESS);
        
        $this->assertDatabaseHas('users', [
            'name' => 'Admin',
            'email' => 'admin@spel.dev'
        ]);

        $this->assertDatabaseHas('roles', [
            'key'  => 'administrator',
            'name' => 'Administrator'
        ]);

        $admin = User::where('email', 'admin@spel.dev')->first();

        $this->assertTrue($admin->isAdmin());
    }

    public function test_running_command_with_default_values()
    {
        $this->artisan('spel:setup --default')
            ->expectsOutput('Creating user `Admin` <admin@spel.dev>...')
            ->expectsOutput('Setting up roles...')
            ->expectsOutput('Creating `Administrator` role...')
            ->expectsOutput('Assigning Administrator role to Admin...')
            ->expectsOutput('Setup complete!')
            ->assertExitCode(Setup::EXIT_SUCCESS);
        
        $this->assertDatabaseHas('users', [
            'name' => 'Admin',
            'email' => 'admin@spel.dev'
        ]);

        $this->assertDatabaseHas('roles', [
            'key'  => 'administrator',
            'name' => 'Administrator'
        ]);

        $admin = User::where('email', 'admin@spel.dev')->first();

        $this->assertTrue($admin->isAdmin());        
    }
}
