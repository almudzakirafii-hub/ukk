<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Game extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'matches';

    protected $fillable = [
        'team_id',
        'opponent',
        'match_date',
        'location',
        'type',
        'status',
        'team_score',
        'opponent_score',
        'notes',
    ];

    protected $casts = [
        'match_date' => 'datetime',
    ];

    /**
     * Get the team for this match
     */
    public function team()
    {
        return $this->belongsTo(Team::class);
    }

    /**
     * Get result of the match (win, loss, draw)
     */
    public function getResultAttribute()
    {
        if ($this->team_score === null || $this->opponent_score === null) {
            return 'TBD';
        }

        if ($this->team_score > $this->opponent_score) {
            return 'WIN';
        } elseif ($this->team_score < $this->opponent_score) {
            return 'LOSS';
        }

        return 'DRAW';
    }
}
