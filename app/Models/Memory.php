<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Memory extends Model
{
    protected $fillable = [
        'trip_id',
        'title',
        'location',
        'date',
        'description',
    ];

    public function trip()
    {
        return $this->belongsTo(Trip::class);
    }
}