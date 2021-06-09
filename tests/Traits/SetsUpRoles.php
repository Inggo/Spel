<?php

namespace Tests\Traits;

use Inggo\Spel\Models\Role;
use Inggo\Spel\Models\User;
use Laravel\Dusk\Browser;

trait SetsUpRoles
{    
    public function setUp() : void
    {
        parent::setUp();
        Role::setupRolesFromConfig();
    }

    public function actAsAdmin()
    {
        $user = $this->getAdminUser();

        $this->actAsOrLoginAs($user);

        return $user;
    }

    public function actAsNonAdmin()
    {
        $user = User::factory()->create();

        $this->actAsOrLoginAs($user);

        return $user;
    }

    public function actAsOrLoginAs(User $user)
    {
        if ($this instanceof \Tests\DuskTestCase) {
            return $this->browse(function (Browser $browser) use ($user) {
                $browser->loginAs($user);
            });
        }

        return $this->actingAs($user);
    }

    public function getAdminUser()
    {
        $user = User::factory()->create();

        $admin = Role::administrator();

        $user->roles()->save($admin);

        $user->fresh();

        return $user;
    }
}
