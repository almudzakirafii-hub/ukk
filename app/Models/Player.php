<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Player extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'team_id',
        'name',
        'jersey_number',
        'position',
        'height',
        'weight',
        'birth_date',
        'photo',
        'biography',
        'status',
    ];

    protected $casts = [
        'birth_date' => 'date',
    ];

    /**
     * Get the team that owns this player
     */
    public function team()
    {
        return $this->belongsTo(Team::class);
    }
}
