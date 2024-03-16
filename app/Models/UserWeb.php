<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use App\Models\Roles;

class UserWeb extends Model
{
    use HasFactory;

    protected $table = 'users';

    protected $fillable = [
        'nik',
        'name',
        'email',
        'password',
        'phone',
        'role_id',
    ];

    public function roles()
    {
        return $this->belongsTo(Roles::class, 'role_id');
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($user) {
            $user->password = Hash::make($user->password);
        });

        static::updating(function ($user) {
            $user->password = Hash::make($user->password);
        });
    }
}
