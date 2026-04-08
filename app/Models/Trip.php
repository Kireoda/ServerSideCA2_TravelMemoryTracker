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
        'cover_image',
        'user_id'
    ];

    public function images()
    {
        return $this->hasMany(TripImage::class);
    }

    public function getCoverImageUrlAttribute(): ?string
    {
        $path = $this->cover_image;

        if (! $path) {
            if ($this->relationLoaded('images')) {
                $path = optional($this->images->first())->path;
            } else {
                $path = $this->images()->value('path');
            }
        }

        return $path ? asset('storage/'.$path) : null;
    }

    public function memories()
    {
        return $this->hasMany(Memory::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    protected static function booted(): void
    {
        static::created(function (Trip $trip) {
            $trip->memories()->create([
                'title' => 'Trip Highlight',
                'location' => $trip->location,
                'date' => $trip->start_date,
                'description' => $trip->description ?: 'Highlight memory for this trip.',
            ]);
        });
    }
}
