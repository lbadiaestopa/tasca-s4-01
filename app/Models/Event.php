<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
        'name',
        'type',
        'venue',
        'start_date',
        'end_date',
        'program_id',
    ];

    public function program()
    {
        return $this->belongsTo(Program::class);
    }
}
