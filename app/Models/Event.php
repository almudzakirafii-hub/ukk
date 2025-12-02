<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Event extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'team_id',
        'title',
        'description',
        'event_date',
        'location',
        'category',
        'image',
        'capacity',
    ];

    protected $casts = [
        'event_date' => 'datetime',
    ];

    /**
     * Get the team for this event
     */
    public function team()
    {
        return $this->belongsTo(Team::class);
    }
}
