<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    protected $fillable = [
        'title',
        'type',
        'genre',
        'release_year',
        'duration_minutes',
        'total_episodes',
    ];

    protected $casts = [
        'release_year'     => 'integer',
        'duration_minutes' => 'integer',
        'total_episodes'   => 'integer',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
