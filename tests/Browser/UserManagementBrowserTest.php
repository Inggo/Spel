<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Tests\Traits\SetsUpRoles;

class UserManagementBrowserTest extends DuskTestCase
{
    use DatabaseMigrations, SetsUpRoles;

    public function test_non_administrators_should_not_see_link_to_user_management()
    {
        $this->actAsNonAdmin();

        $this->browse(function (Browser $browser) {
            $browser->visit('/dashboard')
                ->screenshot('non-admin-user')
                ->assertDontSee('User Management');
        });
    }

    public function test_administrators_should_see_link_to_user_management()
    {
        $this->actAsAdmin();

        $this->browse(function (Browser $browser) {
            $browser->visit('/dashboard')
                ->screenshot('admin-user')
                ->assertSee('User Management');
        });
    }
}
