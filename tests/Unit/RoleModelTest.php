<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Tests\Traits\SetsUpRoles;
use Inggo\Spel\Models\Role;

class RoleModelTest extends TestCase
{
    use RefreshDatabase, SetsUpRoles;

    /**
     * @dataProvider roleInfoProvider
     */
    public function test_role_attributes($key, $name)
    {
        $role = Role::factory()->make([
            'key'  => $key,
            'name' => $name
        ]);

        $this->assertEquals($key, $role->key);
        $this->assertEquals($name, $role->name);
    }

    public function test_administrator_static_method()
    {
        $this->assertEquals(Role::administrator()->key, Role::KEY_ADMIN);
    }

    public function test_setup_roles()
    {
        Role::setupRoles($this->customRoles());
        
        $this->assertDatabaseHas('roles', [
            'key' => 'imperator',
            'name' => 'Emperor'
        ]);
        
        $this->assertDatabaseHas('roles', [
            'key' => 'indio',
            'name' => 'Indio'
        ]);
    }

    public function roleInfoProvider()
    {
        return collect($this->customRoles())->map(function ($name, $key) {
            return [$key, $name];
        });
    }

    public function customRoles()
    {
        return [
            'imperator' => 'Emperor',
            'patrician' => 'Patrician',
            'plebeian' => 'Plebeian',
            'peninsulares' => 'Peninsulares',
            'insulares' => 'Insulares',
            'mestizo' => 'Mestizo',
            'indio' => 'Indio',
        ];
    }
}
