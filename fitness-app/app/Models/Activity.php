<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'date',
        'time_start',
        'time_end',
        'activity',
        'time_spent',
        'distance',
        'set_count',
        'reps',
        'note',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'date' => 'date',
        'time_start' => 'datetime',
        'time_end' => 'datetime',
        'set_count' => 'integer',
        'reps' => 'integer',
    ];
}
