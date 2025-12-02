<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Team extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'logo',
        'founded_year',
        'achievements',
    ];

    /**
     * Get all players for this team
     */
    public function players()
    {
        return $this->hasMany(Player::class);
    }

    /**
     * Get all matches for this team
     */
    public function matches()
    {
        return $this->hasMany(\App\Models\Game::class);
    }

    /**
     * Get all events for this team
     */
    public function events()
    {
        return $this->hasMany(Event::class);
    }

    /**
     * Get all gallery images for this team
     */
    public function galleries()
    {
        return $this->hasMany(Gallery::class);
    }

    /**
     * Get all news for this team
     */
    public function news()
    {
        return $this->hasMany(News::class);
    }
}
