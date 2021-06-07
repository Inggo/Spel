<?php

namespace Inggo\Spel\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;
use Inggo\Spel\Models\User;
use Inggo\Spel\Models\Role;
use Exception;

class Setup extends Command
{
    const EXIT_DEFAULT = 0b0;
    const EXIT_SUCCESS = 0b1;
    const EXIT_ERROR   = 0b10;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'spel:setup
        {--D|default : Use default values from ENV variables}
    ';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sets up a Spel application';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $useDefaults = $this->option('default');

        // Prompt for administrator details
        $name     = $useDefaults ? config('spel.defaults.admin.name') : $this->ask(__('spel.setup.ask.name'));
        $email    = $useDefaults ? config('spel.defaults.admin.email') : $this->ask(__('spel.setup.ask.email'));
        $password = $useDefaults ? config('spel.defaults.admin.password') : $this->secret(__('spel.setup.ask.password'));

        // Create administrator User
        $this->info(__('spel.setup.activity.user', [
            'name'  => $name,
            'email' => $email
        ]));

        $user = User::create([
            'name'     => $name,
            'email'    => $email,
            'password' => Hash::make($password)
        ]);

        // Create roles
        $this->info(__('spel.setup.activity.roles'));

        Role::setupRolesFromConfig(function ($role) {
            $this->info(__('spel.setup.activity.role', [
                'role'  => $role
            ]));
        });

        $admin = Role::administrator();
        
        $this->info(__('spel.setup.activity.admin', [
            'role' => $admin->name,
            'name' => $user->name
        ]));

        $user->roles()->save($admin);

        $this->info(__('spel.setup.success'));
        return self::EXIT_SUCCESS;
    }
}
