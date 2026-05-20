<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Membership;
use App\Models\Program;

class Orchestra extends Model
{

    protected $fillable = [
        'name',
        'city',
        'venue',
        'program_id',
    ];

    public function memberships()
    {
        return $this->hasMany(Membership::class);
    }

    public function programs()
    {
        return $this->hasMany(Program::class);
    }

    public function admins()
    {
        return $this->belongsToMany(User::class, 'memberships')
            ->wherePivot('role', 'admin');
    }
}
