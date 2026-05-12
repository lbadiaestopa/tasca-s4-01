<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    protected $fillable = [
        'name',
        'start_date',
        'end_date'
    ];

    public function orchestra() 
    {
        return $this->belongsTo(Orchestra::class);
    }
}
