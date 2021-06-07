<?php

namespace Inggo\Spel\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    const KEY_ADMIN = 'administrator';

    protected $fillable = [
        'key',
        'name'
    ];

    public static function administrator()
    {
        return self::where('key', self::KEY_ADMIN)->firstOrFail();
    }

    public static function admin()
    {
        return self::administrator();
    }

    public static function setupRoles(array $roles, $successCallback = null)
    {
        foreach ($roles as $key => $role) {
            Role::create([
                'key'  => $key,
                'name' => $role
            ]);

            if ($successCallback) $successCallback($role);
        }
    }

    public static function setupRolesFromConfig($successCallback = null)
    {
        return self::setupRoles(config('spel.roles'), $successCallback);
    }
}
