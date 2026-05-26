<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    protected $fillable = [
        'name',
        'start_date',
        'end_date',
        'orchestra_id',
    ];

    protected $casts = [
        'start_date' => 'datetime',
        'end_date' =>'datetime',
    ];

    public function orchestra()
    {
        return $this->belongsTo(Orchestra::class);
    }

    public function events()
    {
        return $this->hasMany(Event::class)->orderBy('start_date');
    }
}
