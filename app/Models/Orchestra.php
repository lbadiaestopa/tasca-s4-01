<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
    return $this->hasMany(Membership::class, 'orchestra_id', 'orchestra_id');
}
}
