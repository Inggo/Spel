<?php

namespace App\Models;

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
}
