<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Gallery extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'team_id',
        'title',
        'description',
        'image',
        'taken_date',
        'category',
    ];

    protected $casts = [
        'taken_date' => 'date',
    ];

    /**
     * Get the team for this gallery
     */
    public function team()
    {
        return $this->belongsTo(Team::class);
    }
}
