<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    protected $fillable = [
        'title',
        'location',
        'start_date',
        'end_date',
        'description',
        'user_id'
    ];

    public function memories()
    {
        return $this->hasMany(Memory::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}