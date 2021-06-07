<?php

namespace Tests\Traits;

use Inggo\Spel\Models\Role;

trait SetsUpRoles
{    
    public function setUp() : void
    {
        parent::setUp();
        Role::setupRolesFromConfig();
    }
}
