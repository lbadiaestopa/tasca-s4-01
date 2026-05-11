<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Membership;

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
}
