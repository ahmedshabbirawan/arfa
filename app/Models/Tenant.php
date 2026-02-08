<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tenant extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'slug',
        'domain',
        'plan',
        'is_active',
        'trial_ends_at',
        'email',
        'phone',
        'currency',
        'timezone',
    ];

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
